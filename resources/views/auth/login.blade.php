@extends('layouts.head')

@section('content')
    <header id="top" class="header">
        <div class="text-vertical-center">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 text-center text-uppercase">
                                <h3 class="text-muted text-left fifa-font">Login</h3>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <p class="text-muted text-italic text-justify text-center">Please login using your credentials.</p>
                            </div>
                        </div>


                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-10 col-md-offset-1">
                                    <input id="email" type="email" placeholder="Email" class="form-control"
                                           name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block text-muted">
                                        {{ $errors->first('email') }}
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-10 col-md-offset-1">
                                    <input id="password" type="password" placeholder="Password" class="form-control"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block text-muted">
                                        {{ $errors->first('password') }}
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group text-left">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"
                                                   name="remember" {{ old('remember') ? 'checked' : '' }}> Remember
                                            Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <button type="submit" class="btn btn-block">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <a href="/register" class="">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection