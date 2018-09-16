<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\Shopsdislike;
use App\Listprefrredshop;
use File;
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

    public function shops_list()
    {
        $shops = Shop::orderBy('id', 'DESC')->get();
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
        $image = $request->file('selectedImage');
        if(File::isFile($image)){
            $path = public_path('/assets/images/gallery/');
            $nom_image = $request->name . "_" . str_random(8) . "." . $image->getClientOriginalExtension();
            $image->move($path, $nom_image);
        }
        
        $shop = new Shop();
        $shop->name = $request->name;
        $shop->image = $nom_image;
        $shop->address = $request->address;

        $result_shop = $shop->saveOrFail();
        if($result_shop){
            return response()->json([
                'shop' => $shop,
                'msg' => 'Shop created successfully !'
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

    public function update_shop(Request $request)
    {
        $shop = Shop::find($request->id);
        $shop->name = $request->name;
        $shop->address = $request->address;
        $image_upload = false;

        $image = $request->file('selectedImage');
        if(File::isFile($image)){
            $path = public_path('/assets/images/gallery/');
            if(file_exists($path . $shop->image))
            {
                File::Delete($path . $shop->image);
            }
            $nom_image = $request->name . "_" . str_random(8) . "." . $image->getClientOriginalExtension();
            $image->move($path, $nom_image);
            $shop->image = $nom_image;
            $image_upload = true;
        }
        
        $result_shop = $shop->saveOrFail();
        if($result_shop){
            return response()->json([
                'msg' => 'Shop updated successfully !',
                'image_upload' => $image_upload
            ], 200);
        }else{
            return response()->json([
                'msg' => 'Something went wrong. Failed action !'
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::find($id);
        $pathImage = public_path('/assets/images/gallery/') . $shop->image;
        if(file_exists($pathImage))
        {
            File::Delete($pathImage);
        }
        $result = Shop::where('id','=', $id)->delete();
        if($result){
            return response()->json([
                'message' => 'Shop removed successfully !'
            ], 200);
        }else{
            return response()->json([
                'message' => 'Action Failed  !'
            ], 200);
        }
    }
}
