@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Add A New Award</h1>
                <form action="/admin/awards/create" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="award">Award Name</label>
                        <input type="text" class="form-control" id="award" name="award">
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="text" class="form-control" id="year" name="year">
                    </div>
                    <div class="form-group">
                        <label for="lgID">League</label>
                        <input type="text" class="form-control" id="lgID" name="lgID">
                    </div>
                    <button class="btn btn-defualt" type="button">Cancel</button>
                    <button class="btn btn-success" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection