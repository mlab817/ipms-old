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
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form action="{{ url()->current() }}" method="GET" role="search">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Search</label>
                                            <input type="search" class="form-control" name="search" placeholder="Search in title..." value="{{ request()->input('search')  }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Order By:</label>
                                            <select name="orderBy" class="form-control" style="width: 100%;">
                                                <option value="id" @if(request()->input('orderBy') == 'id') selected @endif>ID</option>
                                                <option value="title"  @if(request()->input('orderBy') == 'title') selected @endif>Title</option>
                                                <option value="total_project_cost"  @if(request()->input('orderBy') == 'total_project_cost') selected @endif>Total Project Cost</option>
                                                <option value="project_status_id"  @if(request()->input('orderBy') == 'project_status_id') selected @endif>Project Status</option>
                                                <option value="office_id"  @if(request()->input('orderBy') == 'office_id') selected @endif>Office</option>
                                                <option value="created_by"  @if(request()->input('orderBy') == 'created_by') selected @endif>Added By</option>
                                                <option value="updated_at"  @if(request()->input('orderBy') == 'updated_at') selected @endif>Last Updated</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Sort Order:</label>
                                            <select name="sortOrder" class="form-control" style="width: 100%;">
                                                <option selected value="ASC" @if(request()->input('sortOrder') == 'ASC') selected @endif>ASC</option>
                                                <option value="DESC" @if(request()->input('sortOrder') == 'DESC') selected @endif>DESC</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Search
                        </button>
                    </div>
                </form>
            </div>

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h1 class="card-title">Projects</h1>
                </div>
                <div class="card-body p-0">
                    <table class="table table-responsive table-valign-middle">
                        <thead>
                            <tr>
                                <th class="text-center text-sm" style="width: 10px;">#</th>
                                <th class="text-center text-sm" style="width: 40%">Title</th>
                                <th class="text-center text-sm" style="width: 10%">Total Project Cost (PhP)</th>
                                <th class="text-center text-sm" style="width: 10%">Project Status</th>
                                <th class="text-center text-sm">Office</th>
                                <th class="text-center text-sm">Added By</th>
                                <th class="text-center text-sm">Last Updated</th>
                                <th class="text-center text-sm"></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($projects as $item)
                                <tr>
                                    <td class="text-sm">{{ $item->id }}</td>
                                    <td class="text-sm">
                                        {!! request()->query('search') ? preg_replace('/(' . request()->query('search') . ')/i', "<span class=\"bg-yellow\">$1</span>", $item->title) : $item->title !!}
                                    </td>
                                    <td class="text-sm text-right">{{ number_format($item->total_project_cost, 2) }}</td>
                                    <td class="text-sm text-center">{{ $item->project_status->name }}</td>
                                    <td class="text-sm text-center">{{ $item->office->acronym }}</td>
                                    <td class="text-sm text-center">
                                        <div class="row justify-content-center align-items-center m-0 p-0">
                                            <img src="{{ $item->creator->avatar }}" class="img-circle img-sm">
                                            <span class="ml-1">{{ $item->creator->first_name }}</span> /
                                            <span>
                                                {{ $item->creator->office->acronym }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="text-sm text-center">
                                        {{  $item->updated_at ? $item->updated_at->diffForHumans(null, null, true) : '-' }}
                                    </td>
                                    <td class="text-nowrap">
                                        @if($item->has_infra)
                                            @if($item->trip_info)
                                                <a href="{{ route('trips.edit', $item) }}" class="btn btn-success btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    TRIP
                                                </a>
                                            @else
                                                <a href="{{ route('trips.create', $item) }}" class="btn btn-success btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    TRIP
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="text-nowrap">
                                        @can('view', $item)
                                            <a href="{{ route('projects.show', $item) }}" class="btn btn-primary btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                                </svg>
                                                <span>View</span>
                                            </a>
                                        @endcan
                                        @can('update', $item)
                                            <a href="{{ route('projects.edit', $item) }}" class="btn btn-secondary btn-sm ml-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                </svg>
                                                <span>Edit</span>
                                            </a>
                                        @endcan

                                        <a target="_blank" href="{{ route('projects.generatePdf', $item) }}" class="btn btn-info btn-sm ml-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" clip-rule="evenodd" />
                                            </svg>
                                            <span>Print</span>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%" class="text-sm text-center">No projects found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($projects->count() > 10)
                <div class="card-footer">
                    <span class="text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ $projects->count() . ' PAPs found' }}
                    </span>
                    <div class="card-tools">
                        {!! $projects->onEachSide(1)->appends(request()->except('page'))->links() !!}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
@stop
