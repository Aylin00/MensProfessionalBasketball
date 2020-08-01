@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Player Information</h1>
                <form action="/admin/players/edit" method="POST">
                    @csrf
                    <input type="hidden" name="productid" id="productid" value="{{ $player->_id}}">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $player->first_name }}">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $player->last_name }}">
                    </div>
                    <div class="form-group">
                        <label for="conference">Conference</label>
                        <input type="text" class="form-control" id="conference" name="conference" value="{{ $player->conference }}">
                    </div>
                    <div class="form-group">
                        <label for="games_played">Games Played</label>
                        <input type="text" class="form-control" id="games_played" name="games_played" value="{{ $player->games_played }}">
                    </div>
                    <div class="form-group">
                        <label for="minutes">Minutes</label>
                        <input type="text" class="form-control" id="minutes" name="minutes" value="{{ $player->minutes }}">
                    </div>
                    <div class="form-group">
                        <label for="points">Points</label>
                        <input type="text" class="form-control" id="points" name="points" value="{{ $player->points }}">
                    </div>
                    <button class="btn btn-primary" type="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection