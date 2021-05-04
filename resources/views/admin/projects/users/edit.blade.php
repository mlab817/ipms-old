@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <form action="{{ route('admin.projects.users.update', ['project' => $project->uuid, 'user' => $user->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="user_id" class="col-form-label col-sm-3">Project</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" disabled name="project" value="{{ $project->title }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_id" class="col-form-label col-sm-3">User</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="permissions" class="col-form-label col-sm-3">Permissions</label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <label for="read" class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="read" id="read" value="1" @if(old('read', $user->pivot->read) == 1) checked @endif>
                                        Read
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label for="update" class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="update" id="update" value="1" @if(old('update', $user->pivot->update) == 1) checked @endif>
                                        Update
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label for="delete" class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="delete" id="delete" value="1" @if(old('delete', $user->pivot->delete) == 1) checked @endif>
                                        Delete
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label for="review" class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="review" id="review" value="1" @if(old('review', $user->pivot->review) == 1) checked @endif>
                                        Review
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label for="comment" class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="comment" id="comment" value="1" @if(old('comment', $user->pivot->comment) == 1) checked @endif>
                                        Comment
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn mr-2" href="{{ route('admin.projects.index') }}">Back to List</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
