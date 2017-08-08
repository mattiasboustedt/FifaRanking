@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $user->name }}</div>
                    <div class="panel-body">
                        <div class="text-center">
                            <img class="text-center img-rounded" style="max-height: 150px; max-width:150px;"
                                 src="/uploads/avatars/{{ $user->avatar }}">
                            <hr>
                            <h3>{{ $user->name }}</h3>
                            <h4>{{ $user->username }}</h4>
                            <h5>{{ $user->email }}</h5>
                        </div>

                        <hr>

                        <table class="table table-striped text-muted" id="profile_table">
                            <thead>
                            <tr>
                                <th>Rating</th>
                                <th>Change</th>
                                <th>Name</th>
                                <th>Played</th>
                                <th>Won</th>
                                <th>Lost</th>
                                <th>Draw</th>
                                <th>Scored</th>
                                <th>Against</th>
                                <th>Diff</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $user->rating->rating }}</td>
                                <td>{{ $user->rating->rating_change }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->statistics->played_games }}</td>
                                <td>{{ $user->statistics->games_won }}</td>
                                <td>{{ $user->statistics->games_lost }}</td>
                                <td>{{ $user->statistics->games_drawn }}</td>
                                <td>{{ $user->statistics->goals_scored }}</td>
                                <td>{{ $user->statistics->goals_against }}</td>
                                <td>{{ $user->statistics->goal_difference }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <form enctype="multipart/form-data" action="/players/profile" method="POST">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <input class="form-control" type="file" name="avatar" value="Test">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-block">
                                        Upload New Picture
                                    </button>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection