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
                <th class="text-center text-sm" style="width: 40%;">Project Title <br/> <span class="font-weight-lighter text-xs text-muted">Click title to view PIPOL entry</span></th>
                {{--                                <th class="text-center text-sm">Spatial Coverage</th>--}}
                <th class="text-center text-sm">Category</th>
                <th class="text-center text-sm">Status of Submission</th>
                <th class="text-center text-sm">Reason for Dropping</th>
                <th class="text-center text-sm">IPMSv2 Project</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($pipols as $item)
                <tr @if($item->category == 'Dropped') class="bg-lightred" @endif>
                    <td class="text-sm text-nowrap">{{ $item->pipol_code }}</td>
                    <td class="text-sm">
                        @if($item->pipol_url)
                            <a href="{{ config('ipms.pipol_base_url') . $item->pipol_url }}" target="_blank">{{ $item->project_title }}</a>
                        @else
                            {{ $item->project_title }}
                        @endif
                    </td>
                    {{--                                    <td class="text-sm text-center">{{ $item->spatial_coverage }}</td>--}}
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
                    <td class="text-sm text-center">
                        @if($item->reason)
                            {{ $item->reason_id == 6 ? $item->other_reason : $item->reason->name  }}
                        @endif
                    </td>
                    <td class="text-nowrap text-center">
                        @if($item->ipms_id)
                            <a href="{{ route('projects.show', $item->project) }}" class="btn btn-primary btn-sm">Project</a>
                        @else
                            <span class="badge badge-danger">N/A</span>
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
