@extends('layouts.header-sidebar')

@section('sidebar')
    <div class="Layout-sidebar">
        <aside class="px-3 px-md-4 px-lg-5 overflow-auto" style="position: static;">

            <div class="border-bottom color-border-secondary py-3 mt-3 mb-4">
            </div>

            <div class="mb-3 Details" data-repository-hovercards-enabled="" id="dashboard-repos-container" data-pjax-container="" role="navigation" aria-label="Repositories">

            </div>

            <details>
                <summary>
                    PAP Types
                </summary>
                <div>
                    <div class="form-checkbox">
                        <label for="">
                            <input type="checkbox">
                            Program
                        </label>
                    </div>
                </div>
            </details>

        </aside>
    </div>
@stop

@section('content')
    <livewire:report-tables />

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
