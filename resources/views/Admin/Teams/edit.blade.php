@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Team Information</h1>
                <form action="/admin/teams/edit" method="POST">
                    @csrf
                    <input type="hidden" name="productid" id="productid" value="{{ $team->_id}}">
                    <div class="form-group">
                        <label for="name">Team Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $team->name }}">
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="text" class="form-control" id="year" name="year" value="{{ $team->year }}">
                    </div>
                    <div class="form-group">
                        <label for="lgID">League</label>
                        <input type="text" class="form-control" id="lgID" name="lgID" value="{{ $team->lgID }}">
                    </div>
                    <div class="form-group">
                        <label for="franchID">Franchise</label>
                        <input type="text" class="form-control" id="franchID" name="franchID" value="{{ $team->franchID }}">
                    </div>
                    <div class="form-group">
                        <label for="rank">Rank</label>
                        <input type="text" class="form-control" id="rank" name="rank" value="{{ $team->rank }}">
                    </div>
                    <button class="btn btn-primary" type="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection