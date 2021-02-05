<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/',function(){

return 'Home';
});

Route::get('/dashboard',function(){

    return 'dashboard';
    });

Route::get('/redirect/{service}','SocialController@redirect');

Route::get('/callback/{service}','SocialController@callback');

Route::get('fillable','CrudController@getOffers');

        
Route::group(['prefix'=>'offers'],function(){

    //Route::get('store','CrudController@store');

    Route::get('create','CrudController@create');
    Route::post('store','CrudController@store') -> name('offers.store');//lira7 ta3mal save bil database

});



