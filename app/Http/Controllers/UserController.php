<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\District;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function store(Request $request)
    {
        if ($request->user_district_number !== null) {
            $district = new District;
            $district->number = $request->user_district_number;
            $district->name = $request->user_district_name;
            $district->save();
            $district = District::orderBy('created_at','desc')->first();
        }

        $user = new User;
        $user->name = $request->user_name;
        $user->username = $request->user_number;
        if ($request->user_district_number !== null) {
//            dd($district);
            $user->district = $district->number;
        }else{
            $user->district = $request->user_district;
        }
        $user->user_level = $request->user_level;
        if($request->user_password == null) {
            $password = str_random(8);
            $user->password = Hash::make($password);
        }else{
            $user->password = Hash::make($request->user_password);
            $password = $request->user_password;
        }
        $user->save();

        return redirect()->back()->with(['test' => $password]);

    }

}
