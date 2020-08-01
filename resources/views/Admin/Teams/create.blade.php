@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Add A New Team</h1>
                <form action="/admin/teams/create" method="POST">
                @csrf
                     <div class="form-group">
                        <label for="name">Team Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="text" class="form-control" id="year" name="year">
                    </div>
                    <div class="form-group">
                        <label for="lgID">League</label>
                        <input type="text" class="form-control" id="lgID" name="lgID">
                    </div>
                    <div class="form-group">
                        <label for="franchID">Franchise</label>
                        <input type="text" class="form-control" id="franchID" name="franchID">
                    </div>
                    <div class="form-group">
                        <label for="rank">Rank</label>
                        <input type="text" class="form-control" id="rank" name="rank">
                    </div>
                    </div>
                    <button class="btn btn-success" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection