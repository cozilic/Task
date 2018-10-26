<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->user_name;
        $user->username = $request->user_number;
        $user->district = $request->user_district;
        $user->user_level = $request->user_level;
        if($request->user_password == null) {
            $password = str_random(8);
            $user->user_password = Hash::make($password);
        }else{
            $user->user_password = $request->user_password;
        }
        //$user->save();

        return redirect()->back()->with(['test' => $password]);

    }

}
