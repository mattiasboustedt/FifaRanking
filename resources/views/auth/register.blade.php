@extends('layouts.head')

@section('content')
    <header id="top" class="header">
        <div class="text-vertical-center">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 text-center text-uppercase">
                                <h3 class="text-muted text-left fifa-font">Register</h3>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <p class="text-muted text-italic text-justify text-center">Are you ready to face
                                    REALITY? Register below to start using the ELO Rating for FIFA.</p>
                                <br/>
                            </div>
                        </div>

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <input type="text" placeholder="Name" class="form-control" name="name"
                                           value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block text-muted">
                                        {{ $errors->first('name') }}
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <input type="text" placeholder="Username" class="form-control" name="username"
                                           value="{{ old('username') }}">

                                    @if ($errors->has('username'))
                                        <span class="help-block text-muted">
                                        {{ $errors->first('username') }}
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <input type="text" placeholder="Email" class="form-control" name="email"
                                           value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block text-muted">
                                        {{ $errors->first('email') }}
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <input type="password" placeholder="Password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block text-muted">
                                        {{ $errors->first('password') }}
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <input type="password" placeholder="Confirm Password" class="form-control"
                                           name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block text-muted">
                                        {{ $errors->first('password_confirmation') }}
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <button type="submit" class="btn btn-block full-width">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <a href="/login" class="">Back to Login</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>
@endsection