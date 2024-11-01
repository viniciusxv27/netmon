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

    

}