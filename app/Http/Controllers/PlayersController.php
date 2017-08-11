<?php

namespace App\Http\Controllers;

use App\Game;
use App\User;
use Aws\S3\Exception\S3Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Image;
use Symfony\Component\HttpKernel\Client;

class PlayersController extends Controller
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
        $players = User::all();
        return view('players/players', compact('players'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = $id;
        $user = User::find($user_id);
        $games = Game::where('user_a_id', $user->id)->orWhere('user_b_id', $user->id)->get();

        return view('players/details', compact('user', 'games'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function profile()
    {
        $user = Auth::user();
        $games = Game::where('user_a_id', $user->id)->orWhere('user_b_id', $user->id)->get();

        return view('players/profile', compact('user', 'games'));

    }

    public function updateAvatar(Request $request)
    {
        if($request->hasFile('avatar')) {

            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            //Image::make($avatar)->resize(150, 150)->save(public_path('/uploads/avatars/' . $filename));

            try {
                $s3 = App::make('aws')->createClient('s3');
                $s3->putObject(array(
                    'Bucket'     => env('AWS_S3_BUCKET'),
                    'Key'        => 'avatars/' . $filename,
                    'SourceFile' => $avatar,
                    'ACL'          => 'public-read',
                    'StorageClass' => 'REDUCED_REDUNDANCY'
                ));

                $user = Auth::user();
                $user->avatar = env('AWS_S3_URL_AVATARS') . $filename;
                $user->save();

            }catch(S3Exception $e) {

            }

        }

        return redirect()->action('PlayersController@profile');
    }

}
