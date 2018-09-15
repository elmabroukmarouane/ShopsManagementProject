<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest', ['except' => ['logout']]);
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return response()->json([
                'msg' => 'Welcome  ' . Auth::user()->name . ' !'
            ], 200);
        }
        return response()->json([
                'msg' => 'Wrong email or password !'
            ], 500);
    }

    public function logout()
    {
        Auth::logout();
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->role = "user";
        $result_user = $user->saveOrFail();
        if($result_user){
            return response()->json([
                'msg' => 'User created successfully !'
            ], 200);
        }else{
            return response()->json([
                'msg' => 'Something went wrong. Failed action !'
            ], 500);
        }
    }
}
