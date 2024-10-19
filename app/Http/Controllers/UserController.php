<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{


    public function deleteUser(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
    }

    public function pageForgot()
    {
        return view('auth.forgot');
    }

}