@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading fifa-font">Games</div>
                    <div class="panel-body">
                        <table class="table table-striped text-muted" id="games_table">
                            <thead>
                            <tr>
                                <th>P1</th>
                                <th>P1 Score</th>
                                <th>P2</th>
                                <th>P2 Score</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($games as $game)
                                <tr>
                                    <td><a href="/players/{{ $game->userA->id }}"><img class="text-center img-circle"
                                                                                       style="max-height: 22px; max-width:22px; margin-right: 3px"
                                                                                       src="/uploads/avatars/{{ $game->userA->avatar }}">{{ $game->userA->name }}
                                        </a></td>
                                    <td>{{ $game->user_a_score }}</td>
                                    <td><a href="/players/{{ $game->userB->id }}"><img class="text-center img-circle"
                                                                                       style="max-height: 22px; max-width:22px; margin-right: 3px"
                                                                                       src="/uploads/avatars/{{ $game->userB->avatar }}">{{ $game->userB->name }}
                                        </a></td>
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