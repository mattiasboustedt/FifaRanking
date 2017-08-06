<?php

namespace App\Http\Controllers;

use App\Game;
use App\Rating;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
        $users = User::all();
        $games = Game::orderBy('created_at', 'desc')->take(5)->get();
        $ratings = Rating::orderBy('rating', 'desc')->take(5)->get();

        return view('home', compact('games', 'ratings', 'users'));
    }
}
