<?php

use App\Http\Controllers\TelegramBotController;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

Route::get('/setWebhook', function () {
    $url = 'https://05d7-209-198-133-113.ngrok-free.app/telegram/webhook'; // Replace with your ngrok URL
    Telegram::setWebhook(['url' => $url]);
    return 'Webhook set!';
});




Route::post('/telegram/webhook',[TelegramBotController::class,'handleWebhook'])->name('bot.tel');


Route::get('/', function () {
    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', [
        'uses' => 'App\Http\Controllers\DashboardController@index',
        'as' => 'dashboard'
    ]);
    //clients
    Route::get('/clients', [
        'uses' => 'App\Http\Controllers\ClientController@index',
        'as' => 'client.index'
    ]);

    Route::get('/client/create/page/1', [
        'uses' => 'App\Http\Controllers\ClientController@page1',
        'as' => 'client.create.page1'
    ]);

    Route::get('/client/create/page/2', [
        'uses' => 'App\Http\Controllers\ClientController@page2',
        'as' => 'client.create.page2'
    ]);


    Route::get('/client/{id}', [
        'uses' => 'App\Http\Controllers\ClientController@show',
        'as' => 'client.show'
    ]);

    Route::post('/client/store', [
        'uses' => 'App\Http\Controllers\ClientController@store',
        'as' => 'client.store'
    ]);
    Route::post('/client/update/extra/{id}', [
        'uses' => 'App\Http\Controllers\ClientController@update_extra',
        'as' => 'client.update.extra'
    ]);

    Route::post('/client/save', [
        'uses' => 'App\Http\Controllers\ClientController@save',
        'as' => 'client.save'
    ]);


    Route::post('/client/update', [
        'uses' => 'App\Http\Controllers\ClientController@update',
        'as' => 'client.update'
    ]);
    // client  menu
    Route::get('/client/{id}/menu', [
    'uses' => 'App\Http\Controllers\ClientController@menu',
    'as' => 'client.menu.index'
    ]);
    Route::get('/client/{id}/menu/pn',[
        'uses'=>'App\Http\Controllers\ClientController@pn',
        'as'=>'client.menu.pn'
    ]);

    Route::get('/client/{id}/menu/diary', [
    'uses' => 'App\Http\Controllers\ClientController@diary',
    'as' => 'menu.diary'
    ]);

//drugs

    Route::get('/drugs',[
        'uses'=>'App\Http\Controllers\DrugController@index',
        'as'=>'drug.index'
    ]);
    Route::get('/drugs/create',[
        'uses'=>'App\Http\Controllers\DrugController@create',
        'as'=>'drug.create'
    ]);
    Route::post('/drugs/store',[
        'uses'=>'App\Http\Controllers\DrugController@store',
        'as'=>'drug.store'
    ]);
    Route::post('/drugs/update/{id}',[
        'uses'=>'App\Http\Controllers\DrugController@update',
        'as'=>'drug.update'
    ]);
    Route::get('/drugs/destroy/{id}',[
        'uses'=>'App\Http\Controllers\DrugController@destroy',
        'as'=>'drug.destroy'
    ]);
    
    //infant

    Route::post('/client/{id}/infant/store/',[
        'uses'=>'App\Http\Controllers\InfantController@store',
        'as'=>'infant.store'
    ]);
    //appointments
    Route::get('/appointment/{id}', [
        'uses' => 'App\Http\Controllers\AppointmentController@show',
        'as' => 'appointment.show'
    ]);
    Route::post('/appointment/store/{id}', [
        'uses' => 'App\Http\Controllers\AppointmentController@store',
        'as' => 'appointment.store'
    ]);

    Route::post('/appointment/update/{id}', [
        'uses' => 'App\Http\Controllers\AppointmentController@update',
        'as' => 'appointment.update'
    ]);

    Route::get('/appointment/delete/{id}', [
        'uses' => 'App\Http\Controllers\AppointmentController@destroy',
        'as' => 'appointment.destroy'
    ]);
    //appointment
    Route::post('/appointment/art/store',[
        'uses'=>'App\Http\Controllers\ARTController@store',
        'as'=>'art.store'
    ]);

       //Viral load
    Route::post('/virallioad/store/{id}', [
        'uses' => 'App\Http\Controllers\ViralloadController@store',
        'as' => 'viralload.store'
    ]);

    Route::post('/viralload/update/{id}', [
        'uses' => 'App\Http\Controllers\ViralloadController@update',
        'as' => 'viralload.update'
    ]);

    Route::get('/viralload/delete/{id}', [
        'uses' => 'App\Http\Controllers\ViralloadController@destroy',
        'as' => 'viralload.destroy'
    ]);
    
    //Adherence
    Route::post('/adherence/store/{id}', [
        'uses' => 'App\Http\Controllers\AdherenceController@store',
        'as' => 'adherence.store'
    ]);

    Route::post('/adherence/update/{id}', [
        'uses' => 'App\Http\Controllers\AdherenceController@update',
        'as' => 'adherence.update'
    ]);

    Route::get('/adherence/delete/{id}', [
        'uses' => 'App\Http\Controllers\AdherenceController@destroy',
        'as' => 'adherence.destroy'
    ]);

    //TB screening
    Route::post('/TBscreening/store/{id}', [
        'uses' => 'App\Http\Controllers\TBScreeningController@store',
        'as' => 'tb.store'
    ]);
    Route::post('/TBscreening/update/{id}', [
        'uses' => 'App\Http\Controllers\TBScreeningController@update',
        'as' => 'tb.update'
    ]);
    Route::post('/TBscreening/delete/{id}', [
        'uses' => 'App\Http\Controllers\TBScreeningController@destroy',
        'as' => 'tb.destroy'
    ]);



    // admin user
    Route::get('/user', [
        'uses' => 'App\Http\Controllers\UserController@index',
        'as' => 'user.index'
    ]);
    Route::get('/user/create', [
    'uses' => 'App\Http\Controllers\UserController@create',
    'as' => 'user.create'
    ]);

    Route::post('/user/store', [
        'uses' => 'App\Http\Controllers\UserController@store',
        'as' => 'user.store'
    ]);
    Route::post('/user/update/{id}', [
        'uses' => 'App\Http\Controllers\UserController@update',
        'as' => 'user.update'
    ]);
    Route::get('/generate/{id}', [
        'uses' => 'App\Http\Controllers\UserController@decrypt',
        'as' => 'generate.decrypt'
    ]);
});
