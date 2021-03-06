@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading fifa-font">{{ $user->name }}</div>
                    <div class="panel-body">
                        <div class="text-center">
                            <img class="text-center img-rounded" style="max-height: 150px; max-width:150px;"
                                 src="{{ $user->avatar }}">
                            <hr>
                            <h3>{{ $user->name }}</h3>
                            <h4>{{ $user->username }}</h4>
                            <h5>{{ $user->email }}</h5>

                            <div class="row">
                                <form enctype="multipart/form-data" action="/players/profile" method="POST">
                                    <div class="form-group">
                                        <div class="col-md-2 col-md-offset-4">
                                            <input class="form-control" type="file" name="avatar" value="Test">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-block">
                                                Upload New Picture
                                            </button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                            </div>
                        </div>

                        @if(count($user->hasHallOfFame) > 0 )
                            <hr>

                            <h3>Titles</h3>

                            <table class="table table-striped text-muted" id="hall_of_fame_table">
                                <thead>
                                <tr>
                                    <th>Player</th>
                                    <th>Title</th>
                                    <th>Date Achieved</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($user->hasHallOfFame as $hof)
                                    <tr>
                                        <td><i class="fa fa-trophy golden" aria-hidden="false"></i>
                                            <a href="/players/{{ $hof->user->id }}"> <img class="text-center img-circle small-img"
                                                                                          src="{{ $hof->user->avatar }}">{{ $hof->user->name }}
                                            </a><i class="fa fa-trophy golden" aria-hidden="false"></td>
                                        <td>{{ $hof->title }}</td>
                                        <td>{{ $hof->date }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif

                        <hr>

                        <h3>Statistics</h3>

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
                                <td><img class="text-center img-circle small-img"
                                         src="{{ $user->avatar }}">{{ $user->name }}
                                </td>
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

                        <hr>

                        <h3>Games</h3>

                        <table class="table table-striped text-muted" id="games_table">
                            <thead>
                            <tr>
                                <th>P1 : Rating +/-</th>
                                <th>P1 Score</th>
                                <th>P2 : Rating +/-</th>
                                <th>P2 Score</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($games as $game)
                                <tr>
                                    <td><a href="/players/{{ $game->userA->id }}"><img class="text-center img-circle small-img"
                                                                                       src="{{ $game->userA->avatar }}">{{ $game->userA->name }}
                                        </a>({{ $game->user_a_rating_change }})
                                    </td>
                                    <td>{{ $game->user_a_score }}</td>
                                    <td><a href="/players/{{ $game->userB->id }}"><img class="text-center img-circle small-img"
                                                                                       src="{{ $game->userB->avatar }}">{{ $game->userB->name }}
                                        </a>({{ $game->user_b_rating_change }})
                                    </td>
                                    <td>{{ $game->user_b_score }}</td>
                                    <td>{{ $game->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#games_table').DataTable({
                "order": [[4, "desc"]]
            });
        });
    </script>
@endsection