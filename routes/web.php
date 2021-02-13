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

        
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::group(['prefix' => 'offers'], function () {
        //   Route::get('store', 'CrudController@store');
        Route::get('create', 'CrudController@create');
        Route::post('store', 'CrudController@store')->name('offers.store');

        Route::get('all', 'CrudController@getAllOffers')->name('offers.all');

        Route::get('edit/{offer_id}', 'CrudController@editOffer');
        Route::post('update/{offer_id}', 'CrudController@UpdateOffer')->name('offers.update'); //save of edit  


        
        //Route::get('delete/{offer_id}', 'CrudController@delete')->name('offers.delete');
       // Route::get('get-all-inactive-offer', 'CrudController@getAllInactiveOffers');

    });

   // Route::get('youtube', 'CrudController@getVideo') ->middleware('auth');
});



