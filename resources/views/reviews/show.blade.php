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
        </div>
    </section>
@stop
