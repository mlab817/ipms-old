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
                {{ $project->title }}
                <a href="{{ route('projects.show', $project) }}" class="float-right" target="_blank">View Project Info</a>
            </div>

            @include('reviews.result')
        </div>
    </section>
@stop
