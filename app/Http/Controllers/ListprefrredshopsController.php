<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listprefrredshop;
use Auth;

class ListprefrredshopsController extends Controller
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
        $shops = Listprefrredshop::join('shops', 'shops.id', '=', 'listprefrredshops.shop_id')
                    ->select('listprefrredshops.id', 'listprefrredshops.shop_id', 'shops.name', 'shops.image', 'shops.address')
                    ->where('listprefrredshops.user_id', '=', Auth::id())
                    ->get();
        return response()->json([
            'shops'    => $shops,
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
        $listprefrredshop = Listprefrredshop::create([
            'user_id'     => Auth::id(),
            'shop_id'          => $request->shop_id
        ]);

        return response()->json([
            'message'        => 'This shop store is added to your preferred shops list !'
        ], 200);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Listprefrredshop::where('id','=', $id)->delete();
        if($result){
            return response()->json([
                'message' => 'Shop removed from preferred list successfully !'
            ], 200);
        }else{
            return response()->json([
                'message' => 'Action Failed  !'
            ], 200);
        }
    }
}
