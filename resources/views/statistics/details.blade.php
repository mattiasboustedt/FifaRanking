@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">My Stats - {{ $statistic->user->name }} ({{ $statistic->user->email }})</div>

                    <div class="panel-body">
                        <p>{{ $statistic->user->name }}</p>
                        <p>{{ $statistic->user->rating->rating }}</p>
                        <p>{{ $statistic }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
