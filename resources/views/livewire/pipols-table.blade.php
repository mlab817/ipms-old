<div class="card">
    <div class="card-header">
        <strong>PIPOL Entries</strong>
        {!! $search ? 'Showing '. $pipols->count() .' results for <strong>' . $search .'</strong>' : '' !!}
        <div class="card-header-actions">
            <div class="row">
                <input wire:model="search" class="form-control form-control-sm" type="search" placeholder="Search Projects..." style="width: 200px;">
                <a href="{{ route('pipols.create') }}"
                   class="btn btn-primary btn-sm mx-2">New Entry</a>
            </div>
        </div>
    </div>
    <div class="card-body p-0 table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th class="text-center text-sm text-nowrap">
                    <a wire:click.prevent="sortBy('id')" role="button" href="#">
                        #
                        @include('includes.sort-icon', ['field' => 'id'])
                    </a>
                </th>
                <th class="text-center text-sm text-nowrap">
                    <a wire:click.prevent="sortBy('pipol_code')" role="button" href="#">
                        PIPOL Code
                        @include('includes.sort-icon', ['field' => 'pipol_code'])
                    </a>
                </th>
                <th class="text-center text-sm text-nowrap" style="width: 40%;">
                    <a wire:click.prevent="sortBy('project_title')" role="button" href="#">
                        Project Title
                        @include('includes.sort-icon', ['field' => 'project_title'])
                    </a>
                </th>
                {{--                                <th class="text-center text-sm">Spatial Coverage</th>--}}
                <th class="text-center text-sm text-nowrap">
                    <a wire:click.prevent="sortBy('category')" role="button" href="#">
                        Category
                        @include('includes.sort-icon', ['field' => 'category'])
                    </a>
                </th>
                <th class="text-center text-sm text-nowrap">
                    <a wire:click.prevent="sortBy('submission_status')" role="button" href="#">
                        Status of Submission
                        @include('includes.sort-icon', ['field' => 'submission_status'])
                    </a>
                </th>
                <th class="text-center text-sm text-nowrap">Reason for Dropping</th>
                <th class="text-center text-sm text-nowrap">IPMSv2 Project</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($pipols as $item)
                <tr @if($item->category == 'Dropped') class="bg-lightred" @endif>
                    <td class="text-sm text-center">
                        {{ $item->id }}
                    </td>
                    <td class="text-sm text-nowrap">{{ $item->pipol_code }}</td>
                    <td class="text-sm">
                        {!! $search ? preg_replace('/(' . $search . ')/i', "<span class=\"bg-yellow\">$1</span>", $item->project_title) : $item->project_title !!}
                        @if($item->pipol_url)
                            <a href="{{ config('ipms.pipol_base_url') . $item->pipol_url }}" target="_blank">
                                <small>View in PIPOL</small>
                            </a>
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
                        <a href="{{ route('pipols.edit', $item) }}" class="btn btn-dark btn-sm">Edit</a>
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
        <div class="card-tools float-right">
            {!! $pipols->links() !!}
        </div>
    </div>
</div>
