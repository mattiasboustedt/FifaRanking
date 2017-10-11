<?php

namespace App\Http\Controllers;

use App\HallOfFame;
use App\User;
use Illuminate\Http\Request;

class AdministrationController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view ('administration/administration', compact('users'));
    }

    public function store(Request $request)
    {
        if($request['current_champion'] === 'on') {
            $request['current_champion'] = 1;
        } else {
            $request['current_champion'] = 0;
        }

        $this->validate($request, [
            'user_id' => 'required',
            'title' => 'required',
            'current_champion' => 'required',
            'date' => 'required',
        ]);

        $hall_of_fame = HallOfFame::create([
            'user_id' => $request['user_id'],
            'title' => $request['title'],
            'current_champion' => $request['current_champion'],
            'date' => $request['date']

        ]);

        if($request['current_champion'] === 1) {
            $all_hall_of_fames = $hall_of_fame::all();

            foreach($all_hall_of_fames as $h) {
                if($h->id != $hall_of_fame->id ) {
                    $h->current_champion = 0;
                    $h->save();
                }
            }
        }

        return redirect('/administration');
    }
}
