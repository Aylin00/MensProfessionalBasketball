@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card col-md-12">
                <div class="card-body">
                    <h5 class="card-title">{{ $player->first_name." ".$player->last_name }}</h5>
                    <br>
                    <p class="card-text">
                    <b>Conference: </b>{{ $player->conference }}
                    </p>
                    <p class="card-text">
                    <b>Games_played: </b>{{ $player->games_played }}
                    </p>
                    <p class="card-text">
                    <b>Minutes: </b>{{ $player->minutes }}
                    </p>
                    <p class="card-text">
                    <b>Points: </b>{{ $player->points }}
                    </p>
                    <p class="card-text">
                    <b>Rebounds: </b>{{ $player->rebounds }}
                    </p>
                    <p class="card-text">
                    <b>Assists: </b>{{ $player->assists }}
                    </p>
                    <p class="card-text">
                    <b>Steals: </b>{{ $player->steals }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection