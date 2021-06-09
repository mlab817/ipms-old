@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Reports</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Reports</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        <a href="{{ route('reports.pap_types') }}" class="list-group-item">By PAP Type</a>
                        <a href="{{ route('reports.implementation_modes') }}" class="list-group-item">By Mode of Implementation</a>
                        <a href="{{ route('reports.funding_sources') }}" class="list-group-item">By Funding Source</a>
                        <a href="{{ route('reports.spatial_coverages') }}" class="list-group-item">By Spatial Coverage</a>
                        <a href="{{ route('reports.offices') }}" class="list-group-item">By Office</a>
                        <a href="{{ route('reports.tiers') }}" class="list-group-item">By Budget Tier (Categorization)</a>
                        <a href="{{ route('reports.pdp_chapters') }}" class="list-group-item">By PDP Chapter</a>
                        <a href="{{ route('reports.project_statuses') }}" class="list-group-item">By PAP Status</a>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@stop
