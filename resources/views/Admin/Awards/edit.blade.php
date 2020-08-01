@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Award Information</h1>
                <form action="/admin/awards/edit" method="POST">
                    @csrf
                    <input type="hidden" name="productid" id="productid" value="{{ $award->_id}}">
                    <div class="form-group">
                        <label for="award">Award award</label>
                        <input type="text" class="form-control" id="award" name="award" value="{{ $award->award }}">
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="text" class="form-control" id="year" name="year" value="{{ $award->year }}">
                    </div>
                    <div class="form-group">
                        <label for="lgID">League</label>
                        <input type="text" class="form-control" id="lgID" name="lgID" value="{{ $award->lgID }}">
                    </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection