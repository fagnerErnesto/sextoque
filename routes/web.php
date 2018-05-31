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

Route::group(['middleware' => ['web']], function () {
    Auth::routes();
    Route::resource( 'item', 'Item\ItemController' );
    Route::resource( 'company', 'Company\CompanyController' );
    Route::resource( 'brand', 'Brand\BrandController' );

    Route::get( '/', 'HomeController@index' )->name( 'home' );
    Route::get( '/{locale}', function ($locale) {
        if (!session()->has('locale') || ($locale != session()->get('locale'))) {
            session()->put('locale', $locale);
        }
        return redirect()->back();
    })->where('locale', '[A-Za-z-_]+');
});