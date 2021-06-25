<div class="card">
    <div class="card-header">
        <strong>Manage Projects</strong>
        <small>
            {!! $search ? 'Showing '. $projects->count() .' results for <strong>' . $search .'</strong>' : '' !!}
        </small>
        <div class="card-header-actions">
            <input wire:model="search" class="form-control form-control-sm" type="search" placeholder="Search Projects..." style="width: 200px;">
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-responsive table-valign-middle">
            <thead>
            <tr>
                <th class="text-center text-sm text-nowrap" style="width: 10px;">
                    <a wire:click.prevent="sortBy('id')" role="button" href="#">
                        #
                        @include('includes.sort-icon', ['field' => 'id'])
                    </a>
                </th>
                <th class="text-center text-sm" style="width: 40%">
                    <a wire:click.prevent="sortBy('title')" role="button" href="#">
                        Title
                        @include('includes.sort-icon', ['field' => 'title'])
                    </a>
                </th>
                <th class="text-center text-sm text-nowrap" style="width: 10%">
                    <a wire:click.prevent="sortBy('total_project_cost')" role="button" href="#">
                        Total Project Cost
                        @include('includes.sort-icon', ['field' => 'total_project_cost'])
                    </a>
                </th>
                <th class="text-center text-sm" style="width: 10%">
                    <a wire:click.prevent="sortBy('project_status_id')" role="button" href="#">
                        Project Status
                        @include('includes.sort-icon', ['field' => 'project_status_id'])
                    </a>
                </th>
                <th class="text-center text-sm">
                    <a wire:click.prevent="sortBy('office_id')" role="button" href="#">
                        Office
                        @include('includes.sort-icon', ['field' => 'office_id'])
                    </a>
                </th>
                <th class="text-center text-sm">Added By</th>
                <th class="text-center text-sm">
                    <a wire:click.prevent="sortBy('updated_at')" role="button" href="#">
                        Last Updated
                        @include('includes.sort-icon', ['field' => 'updated_at'])
                    </a>
                </th>
                <th class="text-center text-sm">Users</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($projects as $item)
                <tr>
                    <td class="text-sm">{{ $item->id }}</td>
                    <td class="text-sm">
                        {!! $search ? preg_replace('/(' . $search . ')/i', "<strong>$1</strong>", $item->title) : $item->title !!}
                    </td>
                    <td class="text-sm text-right">{{ number_format($item->total_project_cost, 2) }}</td>
                    <td class="text-sm text-center">{{ $item->project_status->name }}</td>
                    <td class="text-sm text-center">{{ $item->office->acronym }}</td>
                    <td class="text-sm text-center">
                        <div class="row justify-content-center align-items-center m-0 p-0">
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
                                <li class="list-inline-item"><img alt="avatar" class="table-avatar img-circle img-sm" src="{{ $user->avatar }}" width="40" height="40"></li>
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
    @if($projects->lastPage() > 1)
        <div class="card-footer">
            <span class="text-sm float-left">
                Showing
                {{ ($projects->currentPage() - 1) * $projects->perPage() + 1 }}
                -
                {{ $projects->currentPage() == $projects->lastPage() ? $projects->lastItem() : $projects->currentPage() * $projects->perPage() }}
                of
                {{ $projects->total() }} entries
            </span>

            <div class="float-right">
                {{ $projects->links() }}
            </div>
        </div>
    @endif
</div>
