@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card col-md-12">
                <div class="card-body">
                    <h5 class="card-title">{{ $team->name }}</h5>
                    <br>
                    <p class="card-text">
                    <b>Year: </b>{{ $team->year }}
                    </p>
                    <p class="card-text">
                    <b>League: </b>{{ $team->lgID }}
                    </p>
                    <p class="card-text">
                    <b>Franchise: </b>{{ $team->franchID }}
                    </p>
                    <p class="card-text">
                    <b>Rank: </b>{{ $team->rank }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection