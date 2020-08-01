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
                <h1>Awards</h1>
                <a class="text-right" href="/admin/awards/create">Add A New Award</a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Award Name</th>
                            <th scope="col">Year</th>
                            <th scope="col">League</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($award as $award)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $award["award"] }}</td>
                                <td>{{ $award["year"] }}</td>
                                <td>{{ $award["lgID"] }}</td>
                                <td>
                                    <a href="/admin/awards/{{ $award['_id'] }}">Details</a> |
                                    <a href="/admin/awards/edit/{{ $award->_id }}">Edit</a> |
                                    <a href="/admin/awards/delete/{{ $award->_id }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection