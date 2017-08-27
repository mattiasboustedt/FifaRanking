@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading fifa-font">News</div>
                    <div class="panel-body">
                        <h4 class="text-bold">General Information</h4>
                        <p>For improvements, suggestions, bug reports, or anything else. Please contact <a href="mailto:{{ $email }}">{{ $name }}.</a></p>
                        <h5>Upcoming changes:</h5>
                        <ol>
                            <li>Edit your profile</li>
                            <li>User administration</li>
                        </ol>
                        <p class="text-bold">PS. Would love some help with improving the GUI!</p>
                        <hr>

                        <h4 class="text-bold">Beta V1.02 - Released</h4>
                        <ul>
                            <li>Implemented roles. 9 out of 10 will not notice any difference (being standard users).</li>
                            <li>Games can now be deleted by an administrator. Deleting a game will also remove any rating and statistics related to that game</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
