@extends('layouts.admin')

@section('breadcrumb')
    @include('includes.breadcrumb', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard'),
        'Report'    => null
]
])
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Reports</strong>
        </div>
        <div class="card-body p-0">
            <ul class="list-group list-group-flush">
                <a href="{{ route('reports.pap_types') }}" class="list-group-item">By PAP Type</a>
                <a href="{{ route('reports.implementation_modes') }}" class="list-group-item">By Mode of Implementation</a>
                <a href="{{ route('reports.funding_sources') }}" class="list-group-item">By Funding Source</a>
                <a href="{{ route('reports.spatial_coverages') }}" class="list-group-item">By Spatial Coverage</a>
                <a href="{{ route('reports.regions') }}" class="list-group-item">By Region</a>
                <a href="{{ route('reports.offices') }}" class="list-group-item">By Office</a>
                <a href="{{ route('reports.tiers') }}" class="list-group-item">By Budget Tier (Categorization)</a>
                <a href="{{ route('reports.pdp_chapters') }}" class="list-group-item">By PDP Chapter</a>
                <a href="{{ route('reports.project_statuses') }}" class="list-group-item">By PAP Status</a>
            </ul>
        </div>
    </div>
@stop
