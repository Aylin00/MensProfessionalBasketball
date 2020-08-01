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
                <h1>Teams</h1>
                <a class="text-right" href="/admin/teams/create">Add A New Team</a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Team Name</th>
                            <th scope="col">Year</th>
                            <th scope="col">League</th>
                            <th scope="col">Franchise</th>
                            <th scope="col">Rank</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($team as $team)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $team["name"] }}</td>
                                <td>{{ $team["year"] }}</td>
                                <td>{{ $team["lgID"] }}</td>
                                <td>{{ $team["franchID"] }}</td>
                                <td>{{ $team["rank"] }}</td>
                                <td>
                                    <a href="/admin/teams/{{ $team['_id'] }}">Details</a> |
                                    <a href="/admin/teams/edit/{{ $team->_id }}">Edit</a> |
                                    <a href="/admin/teams/delete/{{ $team->_id }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

