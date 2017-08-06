@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 text-center text-uppercase">
                                <h3 class="text-muted text-left">Login</h3>
                            </div>
                        </div>

                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="col-md-10 col-md-offset-1">
                                        <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block text-muted">
                                        {{ $errors->first('email') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="col-md-10 col-md-offset-1">
                                        <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block text-muted">
                                        {{ $errors->first('password') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-1">
                                        <button type="submit" class="btn btn-block">
                                            Login
                                        </button>

                                        <a class="btn btn-block" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div id="_giphy_tv" class="giphy-tv"></div>
                <script>
                    var tags = ['fifa', 'zlatan', 'fifa 17', 'fifa 16'];
                    var nbr = Math.floor((Math.random() * tags.length));
                    var _giphy_tv_tag = tags[nbr];
                    var g = document.createElement('script');
                    g.type = 'text/javascript';
                    g.async = true;
                    g.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'giphy.com/static/js/widgets/tv.js';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(g, s);
                </script>
                <iframe src="https://embed.spotify.com/?uri=spotify%3Atrack%3A1IfFphfaKhVd4h6woepFpV" width="100%"
                        height="100" frameborder="0" allowtransparency="true"></iframe>
            </div>
        </div>
    </div>
@endsection