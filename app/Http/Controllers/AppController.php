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
        $data['page'] = 'Home';
        $data['user'] = User::find(session()->get('user'));

        return view('__header', $data) . view('home', $data) . view('__footer');
    }
    public function alerts(Request $request)
    {
        $data['page'] = 'Alerts';

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
            'connection_name'=> 'required',
            'network_name'=> 'required',
            'interface'=> 'required',
        ]);

        $network = Network::find($request->id);
        $network->connection_name = $data['connection_name'];
        $network->network_name = $data['network_name'];
        $network->interface = $data['interface'];
        $network->save();

        session()->flash('success','Network updated successfully!');

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
            'name'=> 'required',
            'email'=> 'required',
        ]);

        $user = User::find(session()->get('user')->id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();

        session()->flash('success','Account updated successfully!');

        return redirect('/accountConfig');
    }

    public function accountDelete(Request $request)
    {   
        $user = User::find(session()->get('user')->id);

        $user->delete();

        session()->flash('success','Account deleted successfully!');

        return redirect('/auth/login');
    }

    public function createConnection(Request $request)
    {
        $data = $request->validate([
            'connection_name'=> 'required',
            'network_name'=> 'required',
            'interface'=> 'required',
        ]);

        $data['user_id'] = session()->get('user')->id;

        Network::create($data);

        session()->flash('success','Connection created successfully!');

        return redirect('/newConnection');
    }

    public function networkConfigEdit(Request $request, $id){
        return $data['network'] = Network::find($id);
    }
    
    public function connectionConfigEdit(Request $request, $id){
        $data['network'] = Network::find($id);
        $data['connections'] = NetworkTraffic::where('network_id', $id)
        ->get();
        $data['count'] = NetworkTraffic::where('network_id', $id)->count();
        
        return $data;
    }

}