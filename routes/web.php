<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* ------------------ Global APP ------------------- */
Route::get('/', function () {
    return view('app');
});
/* ------------------ Global APP ------------------- */

/* ------------------ Login + Registration ------------------- */
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
Route::post('register', 'Auth\LoginController@register');
/* ------------------ Login ------------------- */

/* ------------------ Shops ------------------- */
Route::resource('shops', 'ShopsController');
/* ------------------ Shops ------------------- */

/* ------------------ preferred shops list ------------------- */
Route::resource('listprefrredshops', 'ListprefrredshopsController');
/* ------------------ preferred shops list ------------------- */

/* ------------------ dislike shops list ------------------- */
Route::resource('shopsdislikes', 'ShopsdislikesController');
/* ------------------ dislike shops list ------------------- */

/* ------------------ Ckech Auth ------------------- */
// Check Loging
Route::get('is-logged', function(){
    if (Auth::check()) {
        return response()->json([
                'name_user' => Auth::user()->name,
                'auth_check' => true
            ], 200);
    }
    return response()->json([
            'auth_check' => false
        ], 200);
});
/* ------------------ Ckech Auth ------------------- */
