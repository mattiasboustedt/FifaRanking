@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading fifa-font">Hall of Fame</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('administration.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    <select id="user_id" class="form-control" name="user_id"
                                            value="{{ old('user_id') }}">
                                        <option value="" class="text-muted" disabled selected>Player</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('user_id'))
                                        <span class="help-block text-muted">
                                        {{ $errors->first('user_id') }}
                                        </span>
                                    @endif
                                </div>

                                    <div class="col-md-6">
                                        <input id="title" type="text" placeholder="Title"
                                               class="form-control" name="title"
                                               value="{{ old('title') }}" required autofocus>

                                        @if ($errors->has('title'))
                                            <span class="help-block text-muted">
                                        {{ $errors->first('title') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>


                            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    <input id="date" type="date" placeholder="Date"
                                           class="form-control" name="date"
                                           value="{{ old('date') }}" required autofocus>

                                    @if ($errors->has('date'))
                                        <span class="help-block text-muted">
                                        {{ $errors->first('date') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="current_champion">Current champion: <input id="current_champion" type="checkbox" class="checkbox-inline" name="current_champion"></label>
                                    @if ($errors->has('user_id'))
                                        <span class="help-block text-muted">
                                        {{ $errors->first('user_id') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-block">
                                        Register in Hall of Fame
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection