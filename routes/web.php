<?php

Route::get('/', function () {
    return redirect('/contact');
});


    Route::get('/contact/{name}',function(){
        return redirect('/');
    })->where('name','[A-Za-z]+');
    
    // Route::resource('phonebook','PhonebookController');
    Route::post('getData','ContactController@getData');
    
    
    Route::resource('contact', 'ContactController');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

