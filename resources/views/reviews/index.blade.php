@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Review PAPs</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Review PAPs</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="mt-3"></div>

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" height="40px" width="40px" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">PIP</span>
                            <span class="info-box-number">{{ $pipCount }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" height="40px" width="40px" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 7H7v6h6V7z" />
                                <path fill-rule="evenodd" d="M7 2a1 1 0 012 0v1h2V2a1 1 0 112 0v1h2a2 2 0 012 2v2h1a1 1 0 110 2h-1v2h1a1 1 0 110 2h-1v2a2 2 0 01-2 2h-2v1a1 1 0 11-2 0v-1H9v1a1 1 0 11-2 0v-1H5a2 2 0 01-2-2v-2H2a1 1 0 110-2h1V9H2a1 1 0 010-2h1V5a2 2 0 012-2h2V2zM5 5h10v10H5V5z" clip-rule="evenodd" />
                            </svg>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">TRIP</span>
                            <span class="info-box-number">{{ $tripCount }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2h-1.528A6 6 0 004 9.528V4z" />
                                <path fill-rule="evenodd" d="M8 10a4 4 0 00-3.446 6.032l-1.261 1.26a1 1 0 101.414 1.415l1.261-1.261A4 4 0 108 10zm-2 4a2 2 0 114 0 2 2 0 01-4 0z" clip-rule="evenodd" />
                            </svg>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">Reviewed Projects</span>
                            <span class="info-box-number">{{ $reviewedCount }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" height="40px" width="40px" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Projects</span>
                            <span class="info-box-number">{{ $projectCount }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

            </div>

            <div class="card card-info card-outline">
                <div class="card-header">
                    <div class="card-tools">
                        <form action="{{ route('reviews.index') }}" method="GET" class="form-inline">
                            <div>
                                <select class="form-control form-control-sm mr-1" name="no_review" id="no_review">
                                    <option value="" @if(request()->has('no_review') || !request()->query('no_review')) selected @endif>All</option>
                                    <option value="1" @if(request()->query('no_review') == 1) selected @endif>No Review</option>
                                    <option value="2" @if(request()->query('no_review') == 2) selected @endif>With Review</option>
                                </select>
                            </div>
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
                                <th class="text-sm" style="width: 40%;">Title</th>
                                <th class="text-sm text-center">Office</th>
                                <th class="text-sm text-center">Added by</th>
                                <th class="text-sm text-center">PIP</th>
                                <th class="text-sm text-center">TRIP</th>
                                <th class="text-sm text-center">Review Details</th>
                                <th class="text-sm text-center">PIPOL Entry/Link</th>
                                <th class="text-sm text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($projects as $item)
                                <tr @if(! $item->review) class="bg-lightred" @endif>
                                    <td class="text-sm">
                                        {!! request()->query('search') ? preg_replace('/(' . request()->query('search') . ')/i', "<span class=\"bg-yellow\">$1</span>", $item->title) : $item->title !!}
                                    </td>
                                    <td class="text-sm text-center">{{ optional($item->office)->acronym }}</td>
                                    <td class="text-sm text-center">
                                        {{
                                            $item->creator && $item->creator->office
                                            ? $item->creator->office->acronym . ' - ' . optional($item->creator)->last_name
                                            : ''
                                        }}
                                    </td>
                                    <td class="text-sm text-center">{!! $item->review ? ($item->review->pip ? '<span class="badge badge-success">PIP</span>' : '<span class="badge badge-danger">No</span>') : '' !!}</td>
                                    <td class="text-sm text-center">{!! $item->review ? ($item->review->trip ? '<span class="badge badge-success">TRIP</span>' : '<span class="badge badge-danger">No</span>') : '' !!}</td>
                                    <td class="text-sm text-center">
                                        {{ $item->review ? ($item->review->user ? $item->review->user->office->acronym . ' - ' . $item->review->user->last_name : '') : '' }}
                                    </td>
                                    <td class="text-sm text-center">
                                        @if ($item->pipol)
                                            <a target="_blank" href="{{ config('ipms.pipol_base_url') . $item->pipol->pipol_url }}" class="btn btn-success btn-sm">PIPOL</a>
                                        @endif
                                    </td>
                                    <td class="text-sm text-center">
                                        @can('review', $item)
                                            @if ($item->review)
                                                <a href="{{ route('reviews.edit', ['review' => $item->review]) }}" class="btn btn-sm btn-secondary">Edit Review</a>
                                            @else
                                                <a href="{{ route('reviews.create', ['project' => $item]) }}" class="btn btn-sm btn-info">Add Review</a>
                                            @endif
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%">No project found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <span class="text-sm float-left">
                        Showing
                        {{ ($projects->currentPage() - 1) * $projects->perPage() + 1 }}
                        -
                        {{ $projects->currentPage() == $projects->lastPage() ? $projects->lastItem() : $projects->currentPage() * $projects->perPage() }}
                        of
                        {{ $projects->total() }} entries
                    </span>
                    <div class="card-tools">
                        {!! $projects->appends(request()->except(['_token','page']))->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $('#no_review').on('change', function () {
            this.form.submit();
        });
    </script>
@endpush
