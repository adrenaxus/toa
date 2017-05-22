<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;

class CharacterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$characters = Auth::user()->characters();
        $characters = Auth::user()->characters()->get();
        return view('characters.index', ['characters' => $characters]);
    }
    
    public function edit($character_id)
    {
        //$characters = Auth::user()->characters();
        $character = \App\Character::find($character_id);
        return view('characters.edit', ['character' => $character]);
    }    
}
