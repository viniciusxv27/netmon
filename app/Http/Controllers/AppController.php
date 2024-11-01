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

        return view('__header', $data) . view('networkConfig', $data) . view('__footer');
    }
    
    public function accountConfig(Request $request)
    {
        $data['page'] = 'Account Configs';

        return view('__header', $data) . view('accountConfig', $data) . view('__footer');
    }

    

}