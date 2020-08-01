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
                <h1>Players</h1>
                <a class="text-right" href="/admin/players/create">Add A New Player</a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Conference</th>
                            <th scope="col">Games Played</th>
                            <th scope="col">Minutes</th>
                            <th scope="col">Points</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($player as $player)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $player["first_name"] }}</td>
                                <td>{{ $player["last_name"] }}</td>
                                <td>{{ $player["conference"] }}</td>
                                <td>{{ $player["games_played"] }}</td>
                                <td>{{ $player["minutes"] }}</td>
                                <td>{{ $player["points"] }}</td>
                                <td>
                                    <a href="/admin/players/{{ $player['_id'] }}">Details</a> |
                                    <a href="/admin/players/edit/{{ $player->_id }}">Edit</a> |
                                    <a href="/admin/players/delete/{{ $player->_id }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
