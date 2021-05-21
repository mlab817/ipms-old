@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Search</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Search</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Search Results {{ request()->query('search') ? 'for ' . request()->query('search') : '' }}</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('search.index') }}" method="GET">
                            <div class="col-12 input-group px-0 mb-3">
                                <input name="search" class="form-control" type="search" placeholder="Search" aria-label="Search" required value="{{ request()->query('search') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </form>

                        <ul class="list-group">
                            @forelse($searchResults as $result)
                                <a class="list-group-item d-flex justify-content-between align-items-center @if(! auth()->user()->can('view', \App\Models\Project::find($result->searchable->id))) disabled @endif" href="{{ auth()->user()->can('view', \App\Models\Project::find($result->searchable->id)) ? $result->url : '#' }}">
                                    {{ $result->title }}
                                    @if(! auth()->user()->can('view', \App\Models\Project::find($result->searchable->id)))
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm text-danger" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                </a>
                            @empty
                                <li class="list-group-item">No result(s) found.</li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="card-footer">
                        <span class="text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm text-danger" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd" />
                        </svg> - You have no access to this project.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
