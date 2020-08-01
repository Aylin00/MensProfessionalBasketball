@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete Player</h1>
                <form action="/admin/players/delete" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="hidden" name="productid" id="productid" value="{{ $player->_id}}">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $player->first_name }}">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $player->last_name }}">
                    </div>
                    <div class="form-group">
                        <label for="conference">Conference</label>
                        <input type="text" class="form-control" id="conference" name="conference" value="{{ $player->conference }}">
                    </div>
                    <div class="form-group">
                        <label for="games_played">Games Played</label>
                        <input type="text" class="form-control" id="games_played" name="games_played" value="{{ $player->games_played }}">
                    </div>
                    <div class="form-group">
                        <label for="minutes">Minutes</label>
                        <input type="text" class="form-control" id="minutes" name="minutes" value="{{ $player->minutes }}">
                    </div>
                    <div class="form-group">
                        <label for="points">Points</label>
                        <input type="text" class="form-control" id="points" name="points" value="{{ $player->points }}">
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
                                <h5 class="modal-title" id="MdlDeleteConfirmationLabel">Delete player</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this player? This chages can not be reverted.
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