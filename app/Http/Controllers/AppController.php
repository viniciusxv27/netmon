<?php

namespace App\Http\Controllers;

use App\Models\NetworkTraffic;
use App\Models\Network;
use App\Models\User;
use Illuminate\Http\Request;

class AppController extends Controller
{


    public function index(Request $request)
    {
        $data['connection'] = [];
        $data['page'] = 'Home';
        $data['user'] = User::find(session()->get('user'));
        $data['network'] = Network::where('user_id', session()->get('user')->id)->where('default', true)->first();
        if ($data['network']) {
            $data['connection'] = NetworkTraffic::where('network_id', $data['network']->id)->get();
        }

        return view('__header', $data) . view('home', $data) . view('__footer');
    }
    public function alerts(Request $request)
    {
        $data['connection'] = [];
        $data['page'] = 'Alerts';
        $data['network'] = Network::where('user_id', session()->get('user')->id)->first();
        if ($data['network']) {
            $data['connection'] = NetworkTraffic::where('network_id', $data['network']->id)->get();
            $data['count_danger'] = NetworkTraffic::where('network_id', $data['network']->id)->where('is_danger', 1)->count();
        }

        return view('__header', $data) . view('alerts', $data) . view('__footer');
    }
    public function newConnection(Request $request)
    {
        $data['page'] = 'New Connection';

        return view('__header', $data) . view('newConnection', $data) . view('__footer');
    }
    public function security(Request $request)
    {
        $data['page'] = 'Security';

        return view('__header', $data) . view('security', $data) . view('__footer');
    }
    public function management(Request $request)
    {
        $data['page'] = 'Management';
        $data['networks'] = Network::where('user_id', session()->get('user')->id)->get();
        foreach ($data['networks'] as $network) {
            $data['connections'][$network->id] = NetworkTraffic::where('network_id', $network->id)
                ->get();
        }

        return view('__header', $data) . view('management', $data) . view('__footer');
    }

    public function setDefault(Request $request, $id)
    {

        Network::where('user_id', session()->get('user')->id)->where('id', $id)->update(['default' => true]);
        Network::where('user_id', session()->get('user')->id)->where('id', '!=', $id)->update(['default' => false]);

        return ['status' => 'success'];
    }

    public function help(Request $request)
    {
        $data['page'] = 'Help';

        return view('__header', $data) . view('help', $data) . view('__footer');
    }
    public function networkConfig(Request $request)
    {
        $data['page'] = 'Network Configs';
        $data['networks'] = Network::where('user_id', session()->get('user')->id)->get();

        return view('__header', $data) . view('networkConfig', $data) . view('__footer');
    }

    public function networkUpdate(Request $request)
    {
        $data = $request->validate([
            'networkSelect' => 'required',
            'connection_name' => 'required',
            'network_name' => 'required',
            'interface' => 'required',
        ]);

        $network = Network::find($data['networkSelect']);
        $network->connection_name = $data['connection_name'];
        $network->network_name = $data['network_name'];
        $network->interface = $data['interface'];
        $network->save();

        session()->flash('success', 'Network updated successfully!');

        return redirect('/networkConfig');
    }

    public function networkDelete(Request $request, $id)
    {

        $network = Network::find($id);
        $network->delete();

        session()->flash('success', 'Network deleted successfully!');

        return redirect('/networkConfig');
    }

    public function accountConfig(Request $request)
    {
        $data['page'] = 'Account Configs';

        return view('__header', $data) . view('accountConfig', $data) . view('__footer');
    }

    public function accountUpdate(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::find(session()->get('user')->id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();

        session()->flash('success', 'Account updated successfully!');

        return redirect('/accountConfig');
    }

    public function accountDelete(Request $request)
    {
        $user = User::find(session()->get('user')->id);

        $user->delete();

        session()->flash('success', 'Account deleted successfully!');

        return redirect('/auth/login');
    }

    public function createConnection(Request $request)
    {
        $data = $request->validate([
            'connection_name' => 'required',
            'network_name' => 'required',
            'interface' => 'required',
        ]);

        $data['user_id'] = session()->get('user')->id;

        $network = Network::create($data);
        
        $data['network_id'] = $network->id;

        session()->flash('success', 'Connection created successfully!');

        return redirect('/newConnection');
    }

    public function networkConfigEdit(Request $request, $id)
    {
        return $data['network'] = Network::find($id);
    }

    public function connectionConfigEdit(Request $request, $id)
    {
        $data['network'] = Network::find($id);
        $data['connections'] = NetworkTraffic::where('network_id', $id)
            ->get();
        $data['count'] = NetworkTraffic::where('network_id', $id)->count();

        return $data;
    }

    // PACKETS

    public function getPackets(Request $request)
    {
        $data['network'] = Network::where('user_id', session()->get('user')->id)->where('default', true)->first();
        $data['packets'] = NetworkTraffic::where('network_id', $data['network']->id)
            ->where('created_at', '>=', now()->subDays(7))
            ->get()
            ->groupBy(function ($item) {
                return $item->is_danger ? 'danger' : 'standard';
            });
        $data['packets_per_day'] = NetworkTraffic::where('network_id', $data['network']->id)
            ->where('created_at', '>=', now()->subDays(7))
            ->get()
            ->groupBy(function ($item) {
            return $item->created_at->format('Y-m-d');
            })
            ->map(function ($day) {
            return [
                'total' => $day->count(),
                'danger' => $day->where('is_danger', 1)->count(),
            ];
            });
        return json_encode($data);
    }

    public function viewPacket(Request $request, $id)
    {
        $data['packet'] = NetworkTraffic::find($id);

        return $data;
    }

    public function deletePacket(Request $request, $id)
    {
        $packet = NetworkTraffic::find($id);
        $packet->delete();

        session()->flash('success', 'Packet deleted successfully!');

        return redirect('/');
    }

    public function dangerPacket(Request $request, $id)
    {
        $packet = NetworkTraffic::find($id);
        if ($packet->is_danger == 1) {
            $packet->is_danger = 0;
        } else {
            $packet->is_danger = 1;
        }
        $packet->save();

        session()->flash('success', 'Packet marked as dangerous!');

        return redirect('/');
    }

}