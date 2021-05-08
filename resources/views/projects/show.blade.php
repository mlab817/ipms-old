@extends('layouts.app')

@section('content')
    <section class="content">
        <!-- Default box -->

        @include('projects.project-details', ['project' => $project , 'pdp_indicators' => \App\Models\PdpIndicator::with('children.children')->whereNull('parent_id')->get()])

        <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
            <i class="fas fa-chevron-up"></i>
        </a>

    </section>
@endsection
