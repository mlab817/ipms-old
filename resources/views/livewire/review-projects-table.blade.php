<div class="card card-info card-outline">
    <div class="card-header">
        {!! $search ? 'Showing '. $projects->count() .' results for <strong>' . $search .'</strong>' : '' !!}
        <div class="card-tools">
            <input wire:model="search" class="form-control form-control-sm" type="search" placeholder="Search Projects..." style="width: 200px;">
        </div>
    </div>
    <div class="card-body p-0 table-responsive">
        <table class="table table-valign-middle">
            <thead>
            <tr>
                <th class="text-sm text-nowrap">
                    <a wire:click.prevent="sortBy('id')" role="button" href="#">
                        #
                        @include('includes.sort-icon', ['field' => 'id'])
                    </a>
                </th>
                <th class="text-sm text-center" style="width: 40%;">
                    <a wire:click.prevent="sortBy('title')" role="button" href="#">
                        Title
                        @include('includes.sort-icon', ['field' => 'title'])
                    </a>
                </th>
                <th class="text-sm text-center">
                    <a wire:click.prevent="sortBy('office_id')" role="button" href="#">
                        Office
                        @include('includes.sort-icon', ['field' => 'office_id'])
                    </a>
                </th>
                <th class="text-sm text-center">
                    <a wire:click.prevent="sortBy('created_by')" role="button" href="#">
                        Added by
                        @include('includes.sort-icon', ['field' => 'created_by'])
                    </a>
                </th>
                <th class="text-sm text-center">PIP</th>
                <th class="text-sm text-center">TRIP</th>
                <th class="text-sm text-center">
                    <a wire:click.prevent="sortBy('submission_status_id')" role="button" href="#">
                        Submission Status
                        @include('includes.sort-icon', ['field' => 'submission_status_id'])
                    </a>
                </th>
                <th class="text-sm text-center">Review Details</th>
                <th class="text-sm text-center">PIPOL Entry/Link</th>
                <th class="text-sm text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($projects as $item)
                <tr @if(! $item->review) class="bg-lightred" @endif>
                    <td class="text-sm text-center">
                        {{ $item->id }}
                    </td>
                    <td class="text-sm text-center">
                        <a href="{{ route('projects.show', $item) }}">
                            {!! $search ? preg_replace('/(' . $search . ')/i', "<span class=\"bg-yellow\">$1</span>", $item->title) : $item->title !!} <small>Click to view</small>
                        </a>
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
                        @if($item->submission_status->name == 'Draft')
                            <span class="badge badge-primary">Draft</span>
                        @elseif($item->submission_status->name == 'Endorsed')
                            <span class="badge badge-success">Endorsed</span>
                        @elseif($item->submission_status->name == 'Dropped')
                            <span class="badge badge-danger">Dropped</span>
                        @endif
                    </td>
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
        <div class="card-tools float-right">
            {!! $projects->appends(request()->except(['_token','page']))->links() !!}
        </div>
    </div>
</div>
