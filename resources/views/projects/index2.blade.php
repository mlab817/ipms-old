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
{{--                <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">--}}
{{--                    <h3 class="card-title">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-xs mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />--}}
{{--                        </svg>--}}
{{--                        Advanced Search--}}
{{--                    </h3>--}}
{{--                    <!-- card tools -->--}}
{{--                    <div class="card-tools">--}}
{{--                        <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-xs" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />--}}
{{--                            </svg>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <!-- /.card-tools -->--}}
{{--                </div>--}}
                <form action="{{ route('projects.index') }}" method="GET" role="search">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Search</label>
                                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request()->input('search')  }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Order By:</label>
                                            <select name="orderBy" class="select2 form-control" style="width: 100%;">
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
                                            <select name="sortOrder" class="form-control select2" style="width: 100%;">
                                                <option selected value="ASC" @if(request()->input('sortOrder') == 'ASC') selected @endif>ASC</option>
                                                <option value="DESC" @if(request()->input('sortOrder') == 'DESC') selected @endif>DESC</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($projects as $item)
                                <tr>
                                    <td class="text-sm">{{ $item->id }}</td>
                                    <td class="text-sm">{{ $item->title }}</td>
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
                                    <td></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%" class="text-sm text-center">No projects found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td class="text-sm text-bold">Total</td>
                                <td class="text-sm text-bold text-right">{{ number_format(\App\Models\Project::sum('total_project_cost'), 2) }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                @if($projects->count() > 10)
                <div class="card-footer">
                    <div class="card-tools">
                        {!! $projects->onEachSide(1)->appends(request()->except('page'))->links() !!}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
@stop
