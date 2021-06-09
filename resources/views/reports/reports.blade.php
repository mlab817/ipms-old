@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $reportVar ?? 'Category' }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('reports.index') }}">Reports</a></li>
                        <li class="breadcrumb-item active">{{ $reportVar ?? 'Category' }}</li>
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
                <div class="card-header">
                    Total Project Cost indicated in the total_project_cost field: PhP {{ number_format(\App\Models\Project::all()->sum('total_project_cost'),2) }}
                    <div class="card-tools">
                        <button onclick="exportTableToCSV('report_table.csv')" class="btn btn-primary float-right">Download Table</button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table id="report_table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ $reportVar ?? 'Category' }}</th>
                                <th class="text-right">No. of Projects</th>
                                <th class="text-right">FY 2022</th>
                                <th class="text-right">FY 2017-2022</th>
                                <th class="text-right">Total Project Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td class="text-right">{{ number_format($item->project_count) }}</td>
                                    <td class="text-right">{{ number_format($item->y2022) }}</td>
                                    <td class="text-right">{{ number_format($item->six_years) }}</td>
                                    <td class="text-right">{{ number_format($item->total_project_cost) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                <th class="text-right">{{ number_format($items->sum('project_count')) }}</th>
                                <th class="text-right">{{ number_format($items->sum('y2022')) }}</th>
                                <th class="text-right">{{ number_format($items->sum('six_years')) }}</th>
                                <th class="text-right">{{ number_format($items->sum('total_project_cost')) }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                @if(isset($note))
                <div class="card-footer">
                    <strong>Note: </strong>{!! $note !!}
                </div>
                @endif
            </div>
        </div>

        @if(isset($projectsMissingData) && count($projectsMissingData) > 0)
        <div class="card card-danger card-outline">
            <div class="card-header">
                <h1 class="card-title">
                    Projects with Missing/Problematic Data
                </h1>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    @foreach($projectsMissingData as $project)
                        <a class="list-group-item list-group-item-action" href="{{ route('projects.show', $project) }}" target="_blank">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $loop->index + 1 . '. ' . $project->title }}</h5>
                                <small>#{{ $project->id }}</small>
                            </div>
                            <p class="mb-1">{{ $project->office->name }}</p>
                            <small>{{ $project->creator->name }}</small>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </section>
@stop

@include('reports.script', ['target' => 'report_table'])
