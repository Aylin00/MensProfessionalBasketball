@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Add A New Player</h1>
                <form action="/admin/players/create" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name">
                    </div>
                    <div class="form-group">
                        <label for="conference">Conference</label>
                        <input type="text" class="form-control" id="conference" name="conference">
                    </div>
                    <div class="form-group">
                        <label for="games_played">Games Played</label>
                        <input type="text" class="form-control" id="games_played" name="games_played">
                    </div>
                    <div class="form-group">
                        <label for="minutes">Minutes</label>
                        <input type="text" class="form-control" id="minutes" name="minutes">
                    </div>
                    <div class="form-group">
                        <label for="points">Points</label>
                        <input type="text" class="form-control" id="points" name="points">
                    </div>
                    <button class="btn btn-success" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection