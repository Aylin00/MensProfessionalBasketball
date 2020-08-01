@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card col-md-12">
                <div class="card-body">
                    <h5 class="card-title">{{ $award->award }}</h5>
                    <br>
                    <p class="card-text">
                    <b>Year: </b>{{ $award->year }}
                    <p class="card-text">
                    <b>League: </b>{{ $award->lgID }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection