@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading fifa-font">Games</div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <p class="alert alert-info text-muted">{{ Session::get('message') }}</p>
                        @endif
                        <table class="table table-striped text-muted" id="games_table">
                            <thead>
                            <tr>
                                <th>P1 : Rating +/-</th>
                                <th>P1 Score</th>
                                <th>P2 : Rating +/-</th>
                                <th>P2 Score</th>
                                <th>Date</th>
                                @if(Auth::user()->hasRole('admin'))
                                    <th></th>
                                @endif

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($games as $game)
                                <tr>
                                    <td><a href="/players/{{ $game->userA->id }}"><img class="text-center img-circle"
                                                                                       style="max-height: 22px; max-width:22px; margin-right: 3px"
                                                                                       src="{{ $game->userA->avatar }}">{{ $game->userA->name }}
                                        </a>({{ $game->user_a_rating_change }})
                                    </td>
                                    <td>{{ $game->user_a_score }}</td>
                                    <td><a href="/players/{{ $game->userB->id }}"><img class="text-center img-circle"
                                                                                       style="max-height: 22px; max-width:22px; margin-right: 3px"
                                                                                       src="{{ $game->userB->avatar }}">{{ $game->userB->name }}
                                        </a>({{ $game->user_b_rating_change }})
                                    </td>
                                    <td>{{ $game->user_b_score }}</td>
                                    <td>{{ $game->created_at }}</td>
                                    @if(Auth::user()->hasRole('admin'))
                                        <td>
                                            <form class="delete" method="POST" action="{{ route('games.destroy', [$game->id]) }}">
                                                <input name="_method" type="hidden" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="">Delete</button>
                                            </form>
                                        </td>
                                    @endif
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

        $(".delete").on("submit", function(){
            return confirm("Do you want to delete this game? This can not be undone.");
        });

    </script>
@endsection