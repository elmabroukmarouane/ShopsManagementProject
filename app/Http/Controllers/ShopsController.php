<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\Shopsdislike;
use App\Listprefrredshop;
use Auth;
use DB;

class ShopsController extends Controller
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
        $shopsdislikes = Shopsdislike::where('user_id', '=', Auth::id())
                                    ->get();
        if(count($shopsdislikes) > 0)
        {
            foreach($shopsdislikes as $shopsdislike)
            {
                $datetime_now = new \DateTime();
                $datetime_shopsdislike = new \Datetime($shopsdislike->show_datetime);
                if($datetime_now > $datetime_shopsdislike)
                {
                    Shopsdislike::where('id','=', $shopsdislike->id)->delete();
                }
            }
        }
        $listprefrredshops = Listprefrredshop::where('user_id', '=', Auth::id())
                                    ->select('listprefrredshops.id')
                                    ->get();
        $shopsdislikes = Shopsdislike::where('user_id', '=', Auth::id())
                                    ->select('shopsdislikes.id')
                                    ->get();
        $listprefrredshops_ids = array();
        $shopsdislikes_ids = array();
        foreach($listprefrredshops as $listprefrredshop)
        {
            array_push($listprefrredshops_ids, $listprefrredshop->id);
        }
        foreach($shopsdislikes as $shopsdislike)
        {
            array_push($shopsdislikes_ids, $shopsdislike->id);
        }
        $count_listprefrredshops = count($listprefrredshops_ids);
        $count_shopsdislikes = count($shopsdislikes_ids);
        if($count_listprefrredshops <= 0 && $count_shopsdislikes <= 0)
        {
            $shops = Shop::select('shops.id', 'shops.name', 'shops.image', 'shops.address')
                        ->orderBy('shops.name', 'asc')
                        ->distinct()
                        ->get();
        }
        else if($count_listprefrredshops > 0 && $count_shopsdislikes <= 0)
        {
            $shops = Shop::select('shops.id', 'shops.name', 'shops.image', 'shops.address')
                    ->whereNotIn('id', $listprefrredshops_ids)
                    ->orderBy('shops.name', 'asc')
                    ->distinct()
                    ->get();
        }
        else if($count_listprefrredshops <= 0 && $count_shopsdislikes > 0)
        {
            $shops = Shop::select('shops.id', 'shops.name', 'shops.image', 'shops.address')
                    ->whereNotIn('id', $shopsdislikes_ids)
                    ->orderBy('shops.name', 'asc')
                    ->distinct()
                    ->get();
        }
        else if($count_listprefrredshops > 0 && $count_shopsdislikes > 0)
        {
            $shops = Shop::select('shops.id', 'shops.name', 'shops.image', 'shops.address')
                    ->whereNotIn('id', $listprefrredshops_ids)
                    ->whereNotIn('id', $shopsdislikes_ids)
                    ->orderBy('shops.name', 'asc')
                    ->distinct()
                    ->get();
        }
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
        //
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
        //
    }
}
