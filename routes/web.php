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

        




