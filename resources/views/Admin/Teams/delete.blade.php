@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete Player</h1>
                <form action="/admin/teams/delete" method="POST">
                    @csrf
                    @method("DELETE")
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
                    <button class="btn btn-defualt" type="button">Cancel</button>
                    <!-- <button class="btn btn-danger" type="submit">Delete</button> -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#MdlDeleteConfirmation">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="MdlDeleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="MdlDeleteConfirmationLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <h5 class="modal-title" id="MdlDeleteConfirmationLabel">Delete Team</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this Team? This chages can not be reverted.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection