<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return response()->json([
            'users'    => $users,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $user->role = $request->role;

        $result_user = $user->saveOrFail();
        if($result_user){
            return response()->json([
                'user' => $user,
                'msg' => 'User created successfully !'
            ], 200);
        }else{
            return response()->json([
                'msg' => 'Something went wrong. Failed action !'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != '')
        {
            $user->password = bcrypt($request->password);
        }
        $user->role = $request->role;
        $result_user = $user->saveOrFail();
        if($result_user){
            return response()->json([
                'msg' => 'User updated successfully !'
            ], 200);
        }else{
            return response()->json([
                'msg' => 'Something went wrong. Failed action !'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = User::where('id','=', $id)->delete();
        if($result){
            return response()->json([
                'message' => 'User removed successfully !'
            ], 200);
        }else{
            return response()->json([
                'message' => 'Action Failed  !'
            ], 200);
        }
    }
}
