<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/characters', 'CharacterController@index');
Route::get('/character/{character_id}', 'CharacterController@edit');










//ajax crud
Route::get('/characters/{character_id?}',function($character_id){
    $character = App\Character::find($character_id);

    return Response::json($character);
});

Route::post('/characters',function(Illuminate\Http\Request $request){
    $character = new App\Character;
    $character->name = $request->name;
    $character->description = $request->description;
    $character->user_id = $request->user_id;
    $character->save();            
    return Response::json($character);
});

Route::put('/characters/{character_id?}',function(Illuminate\Http\Request $request,$character_id){
    $character = App\Character::find($character_id);
    $character->name = $request->name;
    $character->description = $request->description;

    $character->save();

    return Response::json($character);
});

Route::delete('/characters/{character_id?}',function($character_id){
    $character = App\Character::destroy($character_id);

    return Response::json($character);
});

