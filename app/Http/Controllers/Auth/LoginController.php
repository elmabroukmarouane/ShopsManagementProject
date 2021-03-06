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
        $city_array = [
            array(
                'city' => 'Tanger',
                'lat' => '35.7594651',
                'lng' => '-5.833954299999959'
                )
            , array(
                'city' => 'Assilah',
                'lat' => '35.4646127',
                'lng' => '-6.030865400000039'
                ), 
            array(
                'city' => 'Larache',
                'lat' => '35.1744271',
                'lng' => '-6.147396399999934'
                ), 
            array(
                'city' => 'Tétouan',
                'lat' => '35.5888995',
                'lng' => '-5.362551599999961'
                ), 
            array(
                'city' => 'Al Hoceïma',
                'lat' => '35.2445589',
                'lng' => '-3.9317468000000417'
                ), 
            array(
                'city' => 'Oujda',
                'lat' => '34.681962',
                'lng' => '-1.9001550000000407'
                ), 
            array(
                'city' => 'Kénitra',
                'lat' => '34.2540503',
                'lng' => '-6.589016600000036'
                ), 
            array(
                'city' => 'Rabat',
                'lat' => '33.9715904',
                'lng' => '-6.849812899999961'
                ), 
            array(
                'city' => 'Casablanca',
                'lat' => '33.5731104',
                'lng' => '-7.589843400000063'
                ), 
            array(
                'city' => 'Marrakech',
                'lat' => '31.6294723',
                'lng' => '-7.981084499999952'
                ), 
            array(
                'city' => 'Agadir',
                'lat' => '30.4277547',
                'lng' => '-9.598107199999959'
                )
        ];
        $random_city_index = rand(0, 10);
        $user->address = $city_array[$random_city_index]["city"] . ", Maroc";
        $user->lat = $city_array[$random_city_index]["lat"];
        $user->lng = $city_array[$random_city_index]["lng"];
        //$user->address = $request->address;
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
