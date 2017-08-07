@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Players</div>
                    <div class="panel-body">
                        <table class="table table-striped text-muted" id="players_table">
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
                            @foreach ($players as $player)
                                <tr>
                                    <td>{{ $player->rating->rating }}</td>
                                    <td>{{ $player->rating->rating_change }}</td>
                                    <td><a href="/players/{{ $player->id }}">{{ $player->name }}</a></td>
                                    <td>{{ $player->statistics->played_games }}</td>
                                    <td>{{ $player->statistics->games_won }}</td>
                                    <td>{{ $player->statistics->games_lost }}</td>
                                    <td>{{ $player->statistics->games_drawn }}</td>
                                    <td>{{ $player->statistics->goals_scored }}</td>
                                    <td>{{ $player->statistics->goals_against }}</td>
                                    <td>{{ $player->statistics->goal_difference }}</td>
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
        $(document).ready(function(){
            $('#players_table').DataTable({
                "order": [0, 'desc']
            });
        });
    </script>
@endsection