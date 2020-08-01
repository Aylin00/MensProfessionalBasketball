@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('mssg') !== null)
            <div class="alert alert-{{ session('alerttype')}} alert-dismissible fade show" role="alert">
                {{ session('mssg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <h1>Teams Details</h1>
                <div class="card">
                    <input type="hidden" name="productid" id="productid">
                    <div class="card-body">
                        <h5 class="card-title">{{ $team->name }}</h5>
                        <p class="card-text">
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item "><b>Team Name: </b>{{ $team->name }}</li>
                        <li class="list-group-item "><b>Year: </b>{{ $team->year }}</li>
                        <li class="list-group-item "><b>League: </b>{{ $team->lgID }}</li>
                        <li class="list-group-item "><b>Franchise: </b>{{ $team->franchID }}</li>
                        <li class="list-group-item "><b>Rank: </b>{{ $team->rank }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="/admin/teams/edit/{{ $team->_id }}" class="card-link">Edit</a>
                        <a href="/admin/teams/delete/{{ $team->_id }}" class="card-link">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection