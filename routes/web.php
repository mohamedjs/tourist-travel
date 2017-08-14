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

Route::get('/', 'publicOfferController@index');

Route::get('/home', function () {
    return view('index');
});

Route::get('/test1','Tourist_typesController@create');


// /*****************************************************/
// /******************* city routs **********************/
// /*****************************************************/
//
 //Route::get('/createcity','CityController@create');
 //Route::post('/storecity','CityController@store');
 Route::get('/citys/{id}' , 'publicCityController@show');
 //Route::post('/destorycity' , 'CityController@destroy');
 //Route::post('/updatecity' , 'CityController@update') ;
//
// /*****************************************************/
// /******************* offer routs *********************/
// /*****************************************************/
 //Route::get('/createoffer','OfferController@create');
 Route::post('/getcitys' , 'publicOfferController@getCitys');
 Route::post('/getoffers' , 'publicOfferController@showCP');
 //Route::post('/storeoffer','OfferController@store');
 Route::get('/offers/{id}' , 'publicOfferController@offers');
 Route::get('/details/{id}', 'publicOfferController@show');
 //Route::post('/destoryoffer_','OfferController@destroy');

Auth::routes();

//Route::get('/home', 'HomeController@index2');
Route::get('/admin', 'HomeController@index');
Route::prefix('admin')->group(function() {
    /*****************************************************/
    /******************* city routs **********************/
    /*****************************************************/

    Route::get('/createcity','CityController@create');
    Route::post('/storecity','CityController@store');
    Route::get('/citys/{id}' , 'CityController@show');
    Route::post('/destorycity' , 'CityController@destroy');
    Route::post('/updatecity' , 'CityController@update') ;

    /*****************************************************/
    /******************* offer routs *********************/
    /*****************************************************/
    Route::get('/createoffer','OfferController@create');
    Route::post('/getcitys' , 'OfferController@getCitys');
    Route::post('/getoffers' , 'OfferController@showCP');
    Route::post('/storeoffer','OfferController@store');
    Route::get('/offers/{id}' , 'OfferController@offers');
    Route::get('/details/{id}', 'OfferController@show');
    Route::post('/destoryoffer_','OfferController@destroy');
});
// Route::prefix('manager')->group(function() {
//   Route::get('/login' , 'Auth\ManagerLoginController@showLoginForm')->name('manager.login');
//   Route::post('/login' , 'Auth\ManagerLoginController@login')->name('manager.login.submit');
//   Route::get('/' , 'ManagerController@index')->name('manager.dashboard') ;
// });
