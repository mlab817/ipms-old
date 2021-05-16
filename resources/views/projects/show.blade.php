@extends('layouts.admin')

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Project Details</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('projects.own') }}">Own Projects</a></li>
                    <li class="breadcrumb-item active">{{ $project->title }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
    <section class="content">
        <!-- Default box -->

        @include('projects.project-details', ['project' => $project , 'pdp_indicators' => \App\Models\PdpIndicator::with('children.children')->whereNull('parent_id')->get()])

        <!-- Include review result if it exists -->
        @includeWhen($project->review()->exists(), 'projects.review-result', ['review' => $project->review])

        <a id="back-to-top" href="#" class="btn btn-info back-to-top" role="button" aria-label="Scroll to top">
            <svg xmlns="http://www.w3.org/2000/svg" height="20px" width="20px" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
        </a>

    </section>
@endsection
