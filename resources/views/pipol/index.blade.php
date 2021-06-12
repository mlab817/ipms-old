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

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="card-tools">
                        <a href="{{ route('pipols.create') }}" class="btn btn-primary btn-sm">Create PIPOL Entry</a>
                    </div>
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-valign-middle table-striped">
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
                                <tr>
                                    <td class="text-sm text-nowrap">{{ $item->pipol_code }}</td>
                                    <td class="text-sm">
                                        @if($item->pipol_url)
                                            <a href="{{ config('ipms.pipol_base_url') . $item->pipol_url }}" target="_blank">{{ $item->project_title }}</a>
                                        @else
                                            {{ $item->project_title }}
                                        @endif
                                    </td>
                                    <td class="text-sm text-center">{{ $item->spatial_coverage }}</td>
                                    <td class="text-sm text-center">{{ $item->category }}</td>
                                    <td class="text-sm text-center">
                                        @if($item->submission_status == 'Endorsed')
                                            <span class="badge badge-success">{{ $item->submission_status }}</span>
                                            @else
                                            {{ $item->submission_status }}
                                        @endif
                                    </td>
                                    <td class="text-nowrap">
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
                        Showing {{ ($pipols->currentPage() - 1) * $pipols->perPage() + 1 }} - {{ $pipols->currentPage() * $pipols->perPage() }} of {{ $pipols->total() }} entries
                    </span>
                    <div class="card-tools">
                        {!! $pipols->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
