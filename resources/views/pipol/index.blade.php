@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">PIPOL Tracker</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">PIPOL Tracker</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                    <span class="info-box-icon bg-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                        </svg>
                    </span>

                        <div class="info-box-content">
                            <span class="info-box-text">Draft</span>
                            <span class="info-box-number">
                                {{ \App\Models\Pipol::where('submission_status','Draft')->count() }}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                    <span class="info-box-icon bg-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M3 12v3c0 1.657 3.134 3 7 3s7-1.343 7-3v-3c0 1.657-3.134 3-7 3s-7-1.343-7-3z" />
                            <path d="M3 7v3c0 1.657 3.134 3 7 3s7-1.343 7-3V7c0 1.657-3.134 3-7 3S3 8.657 3 7z" />
                            <path d="M17 5c0 1.657-3.134 3-7 3S3 6.657 3 5s3.134-3 7-3 7 1.343 7 3z" />
                        </svg>
                    </span>

                        <div class="info-box-content">
                            <span class="info-box-text">Endorsed as Dropped</span>
                            <span class="info-box-number">
                                {{ \App\Models\Pipol::where('submission_status', 'Endorsed')->where('category','Dropped')->count() }}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                    <span class="info-box-icon bg-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </span>

                        <div class="info-box-content">
                            <span class="info-box-text">Endorsed (Proposed/Ongoing/Completed)</span>
                            <span class="info-box-number">
                                {{ \App\Models\Pipol::where('submission_status','Endorsed')->where('category','<>','Dropped')->count() }}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                            </svg>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">IPMS/PIPOL Matched</span>
                            <span class="info-box-number">
                                {{ \App\Models\Pipol::has('project')->count() }}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

            </div>

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <a href="{{ route('pipols.create') }}" class="btn btn-primary btn-sm">Create PIPOL Entry</a>
                    <div class="card-tools">
                        <form action="{{ route('pipols.index') }}" method="GET">
                            <div class="input-group input-group-sm" style="width: 200px;">
                                <input type="search" name="search" class="form-control float-right" placeholder="Search in title" value="{{ request()->query('search') }}">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-xs" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-valign-middle">
                        <thead>
                            <tr>
                                <th class="text-center text-sm">PIPOL Code</th>
                                <th class="text-center text-sm">Project Title</th>
                                <th class="text-center text-sm">Spatial Coverage</th>
                                <th class="text-center text-sm">Category</th>
                                <th class="text-center text-sm">Status of Submission</th>
                                <th class="text-center text-sm">Project</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pipols as $item)
                                <tr @if(! $item->ipms_id) class="bg-lightred" @endif>
                                    <td class="text-sm text-nowrap">{{ $item->pipol_code }}</td>
                                    <td class="text-sm">
                                        @if($item->pipol_url)
                                            <a href="{{ config('ipms.pipol_base_url') . $item->pipol_url }}" target="_blank">{{ $item->project_title }}</a>
                                        @else
                                            {{ $item->project_title }}
                                        @endif
                                    </td>
                                    <td class="text-sm text-center">{{ $item->spatial_coverage }}</td>
                                    <td class="text-sm text-center">
                                        {!! $item->category == 'Dropped' ? "<span class=\"badge badge-danger\">{$item->category}</span>" : $item->category  !!}
                                    </td>
                                    <td class="text-sm text-center">
                                        @if($item->submission_status == 'Endorsed')
                                            <span class="badge badge-success">{{ $item->submission_status }}</span>
                                            @else
                                            {{ $item->submission_status }}
                                        @endif
                                    </td>
                                    <td class="text-nowrap text-center">
                                        @if($item->ipms_id)
                                        <a href="{{ route('projects.show', $item->project) }}" class="btn btn-primary btn-sm">Project</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('pipols.edit', $item) }}" class="btn btn-info btn-sm">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%">Nothing found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <span class="text-sm float-left">
                        Showing
                        {{ ($pipols->currentPage() - 1) * $pipols->perPage() + 1 }}
                        -
                        {{ $pipols->currentPage() == $pipols->lastPage() ? $pipols->lastItem() : $pipols->currentPage() * $pipols->perPage() }}
                        of
                        {{ $pipols->total() }} entries
                    </span>
                    <div class="card-tools">
                        {!! $pipols->appends(request()->except(['page','_token']))->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
