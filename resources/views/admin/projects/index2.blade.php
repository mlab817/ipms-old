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
                                <th class="text-center text-sm">Users</th>
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
                                    <td class="text-sm text-center text-nowrap">
                                        <ul class="list-inline">
                                        @foreach ($item->users->take(5) as $user)
                                            <li class="list-inline-item"><img alt="avatar" class="table-avatar img-circle" src="{{ $user->avatar }}" width="40" height="40"></li>
                                        @endforeach
                                        @if($item->users->count() > 5) + {{ ($item->users->count() - 5 ) }} others @endif
                                    </td>
                                    <td class="text-nowrap">
                                        <a target="_blank" href="{{ route('admin.projects.users.index', $item) }}" class="btn btn-primary btn-sm ml-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                            </svg>
                                            <span>Manage</span>
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
                <div class="card-footer">
                    <span class="text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ $projects->total() . ' PAPs found' }}
                    </span>
                    <div class="card-tools">
                        {!! $projects->onEachSide(1)->appends(request()->except('page'))->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
