@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Review Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        @can('reviews.view_index')
                            <li class="breadcrumb-item"><a href="{{ route('reviews.index') }}">Review PAPs</a></li>
                        @endcan
                        <li class="breadcrumb-item active">{{ \Illuminate\Support\Str::limit($project->title, 50) }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="callout callout-info">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('projects.show', $project) }}" class="float-right" target="_blank">View Project Info</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Title: <strong>{{ $project->title  }}</strong></p>
                        <p>Office: <strong>{{ $project->office->name ?? '' }}</strong></p>
                    </div>
                    <div class="col">
                        <p>Created by: <img src="{{ $project->creator->avatar }}" width="20" height="20" class="img-circle"> <strong>{{ $project->creator->name ?? '' }}</strong> on <strong>{{ $project->created_at->format('M d, Y') }}</strong></p>
                        <p>Last Updated: <strong>{{ $project->updated_at->format('M d, Y') }}</strong></p>
                    </div>
                </div>
            </div>

            @include('reviews.result')

            <div class="card card-secondary">
                <div class="card-header">
                    <h1 class="card-title">Comments</h1>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="col-1">Made By</td>
                                <td class="col-3">Comment</td>
                                <td class="col-4">Response</td>
                                <td class="col-1">Resolved?</td>
                                <td class="col-1">Commented On</td>
                                <td class="col-2">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($comments as $comment)
                                <tr>
                                    <td>{{ $comment->user->name ?? '' }}</td>
                                    <td>{{ $comment->comment }}</td>
                                    <td>
                                        @if (! $comment->response)
                                            <form class="col form-inline" method="POST" action="{{ route('comments.update', $comment) }}">
                                                @csrf
                                                @method('PUT')
                                                <input type="text" class="col form-control @error('response') is-invalid @enderror" id="response" name="response" placeholder="Type response then press enter...">
                                                @error('response')<p class="invalid-feedback text-danger">{{ $message }}</p>@enderror
                                            </form>
                                        @else
                                            {{ $comment->response }}
                                        @endif

                                    </td>
                                    <td>{!! $comment->is_resolved ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-danger">No</span>' !!}</td>
                                    <td>{{ $comment->updated_at->diffForHumans(null, null, true) }}</td>
                                    <td>
                                        @if(! $comment->is_resolved)
                                        <div class="row text-center">
                                            <form action="{{ route('comments.resolve', $comment) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-success btn-sm mr-1">Resolve</button>
                                            </form>
                                            <form action="{{ route('comments.destroy', $comment)  }}" method="POST" class="form-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%">No comments yet. Add one below.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    @if(! $review->ipd_validated)
                    <form action="{{ route('reviews.validate', $review) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Validate Project</button>
                    </form>
                    @else
                        <span class="text-success">
                            <strong>This project has been validated.</strong>
                        </span>
                    @endif
                </div>
            </div>

            @can('projects.validate')
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Add Comment</h1>
                    </div>
                    <form action="{{ route('projects.comments.store', $project) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3">Comment</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control @error('comment') is-invalid @enderror" rows="4" style="resize: vertical;" name="comment" id="comment" placeholder="Add your comment here"></textarea>
                                    @error('comment')<p class="invalid-feedback text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-secondary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            @endcan
        </div>
    </section>
@stop
