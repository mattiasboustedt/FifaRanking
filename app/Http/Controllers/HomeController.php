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
        $ratings = array();

        //Only include player ratings with 10 played games or more.
        foreach($users as $user) {
                $user_statistics = $user->statistics;
                if ($user_statistics->played_games >= 10) {
                    array_push($ratings, $user->rating);
                }
        }

        //Sort array based on rating, descending.
        usort($ratings, function($a, $b) {
            return $b->rating - $a->rating;
        });

        //Slice the array, only include top 10.
        $ratings = array_slice($ratings, 0 , 10, true);

        return view('home', compact('games', 'ratings', 'users'));
    }
}
