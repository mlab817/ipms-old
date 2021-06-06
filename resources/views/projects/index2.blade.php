@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Projects</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Projects</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-outline card-primary">
{{--                <div class="card-header">--}}
{{--                    <div class="card-tools">--}}
{{--                        <form class="form-inline" action="{{ route('projects.index') }}" method="GET">--}}
{{--                            <div class="input-group input-group-sm" style="width: 200px;">--}}
{{--                                <input type="text" name="q" class="form-control float-right" placeholder="Search">--}}

{{--                                <div class="input-group-append">--}}
{{--                                    <button type="submit" class="btn btn-default">--}}
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-xs" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />--}}
{{--                                        </svg>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="card-body p-0">
                    <table class="table table-responsive table-striped table-valign-middle">
                        <thead>
                        <tr>
                            <th style="width: 5%" class="text-center">
                                #
                            </th>
                            <th style="width: 20%">
                                Project Title
                            </th>
                            <th class="text-center" style="width: 10%">
                                Type
                            </th>
                            <th class="text-center" style="width: 10%">
                                Office
                            </th>
                            <th class="text-right" style="width: 10%;">
                                Total Project Cost (PhP)
                            </th>
                            <th class="text-center" style="width: 10%;">
                                Added by
                            </th>
                            <th style="width: 5%" class="text-center">
                                TRIP
                            </th>
                            <th style="width: 15%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="text" name="title" placeholder="Search title..." class="form-control form-control-sm">
                                </td>
                                <td>
                                    <select name="pap_type_id" class="form-control form-control-sm">
                                        <option value=""></option>
                                        @foreach(\App\Models\PapType::all() as $option)
                                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="pap_type_id" class="form-control form-control-sm">
                                        <option value=""></option>
                                        @foreach(\App\Models\Office::all() as $option)
                                            <option value="{{ $option->id }}">{{ $option->acronym }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td></td>
                                <td>
                                    <select name="pap_type_id" class="form-control form-control-sm">
                                        <option value=""></option>
                                        @foreach(\App\Models\User::all() as $option)
                                            <option value="{{ $option->id }}">{{ $option->full_name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="has_infa" class="form-control form-control-sm">
                                        <option value=""></option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </td>
                                <td></td>
                            </tr>
                            @forelse($projects as $project)
                                <tr>
                                    <td class="text-sm text-center">{{ $project->id }}</td>
                                    <td class="text-sm">{{ $project->title }}</td>
                                    <td class="text-sm text-center">{{ $project->pap_type->name }}</td>
                                    <td class="text-sm text-center">{{ $project->office->acronym }}</td>
                                    <td class="text-sm text-right">{{ number_format($project->total_project_cost, 2) }}</td>
                                    <td class="text-sm text-center">
                                        <p class="text-nowrap">
                                            <img src="{{ $project->creator->avatar }}" class="img-circle img-bordered-sm" width="40">
                                            <span class="ml-1"> {{ $project->creator->full_name }}</span>
                                        </p>
                                    </td>
                                    <td class="text-center text-sm">
                                        @if($project->has_infra && $project->trip_info)
                                            <a href="{{ route('trips.edit', $project) }}" class="btn btn-success btn-sm">TRIP</a>
                                        @elseif ($project->has_infra && !$project->trip_info)
                                            <a href="{{ route('trips.create', $project) }}" class="btn btn-success btn-sm">TRIP</a>
                                        @endif
                                    </td>
                                    <td class="text-sm text-right">
                                        @can('view', $project)
                                            <a href="{{ route('projects.show', $project)  }}" class="btn btn-primary btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                                </svg>
                                                <span>View</span>
                                            </a>
                                        @endcan
                                        @can('update', $project)
                                                <a href="{{ route('projects.edit', $project) }}" class="btn btn-secondary btn-sm ml-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                    </svg>
                                                    <span>Edit</span>
                                                </a>
                                        @endcan
                                        @can('view', $project)
                                            <a target="_blank" href="'. route('projects.generatePdf', $project) .'" class="btn btn-info btn-sm ml-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" clip-rule="evenodd" />
                                                </svg>
                                                <span>Print</span>
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                No items found
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer pb-0">
                    <div class="row">
                        <div class="col-6">
                            <form action="{{ route('projects.index') }}" method="GET" id="change_per_page">
                                <div class="row align-items-center">
                                    <select name="per_page" class="form-control form-control-sm" style="max-width: 70px;" id="per_page">
                                        <option value="10">10</option>
                                        <option value="10">15</option>
                                        <option value="10">25</option>
                                        <option value="10">50</option>
                                    </select>
                                    <span class="ml-1">Entries</span>
                                </div>
                            </form>
                        </div>
                        <div class="col-6">
                            <div class="card-tools float-right">
                                {!! $projects->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@push('scripts')
    <script>
        $('#per_page').change(function () {
            $('#change_per_page').submit();
        });
    </script>
@endpush
