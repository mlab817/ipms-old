<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <strong>Audit Logs</strong>
                    <small>
                        {!! $search ? 'Showing '. $audit_logs->total() .' results for <strong>' . $search .'</strong>' : '' !!}
                    </small>
                    <div class="card-header-actions">
                        <input wire:model="search" class="form-control form-control-sm" type="search" placeholder="Search..." style="width: 200px;">
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
                                <a wire:click.prevent="sortBy('description')" role="button" href="#">
                                    Description
                                    @include('includes.sort-icon', ['field' => 'description'])
                                </a>
                            </th>
                            <th class="text-center text-sm text-nowrap">
                                <a wire:click.prevent="sortBy('auditable_type')" role="button" href="#">
                                    Model
                                    @include('includes.sort-icon', ['field' => 'auditable_type'])
                                </a>
                            </th>
                            <th class="text-center text-sm text-nowrap">
                                <a wire:click.prevent="sortBy('project_status_id')" role="button" href="#">
                                    Model ID
                                    @include('includes.sort-icon', ['field' => 'auditable_id'])
                                </a>
                            </th>
                            <th class="text-center text-sm text-nowrap">
                                <a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                                    User
                                    @include('includes.sort-icon', ['field' => 'user_id'])
                                </a>
                            </th>
                            <th class="text-center text-sm text-nowrap">
                                <a wire:click.prevent="sortBy('host')" role="button" href="#">
                                    Host
                                    @include('includes.sort-icon', ['field' => 'host'])
                                </a>
                            </th>
                            <th class="text-center text-sm text-nowrap">
                                <a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                                    Updated at
                                    @include('includes.sort-icon', ['field' => 'created_at'])
                                </a>
                            </th>
                            <th class="text-center text-sm">
                                View
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($audit_logs as $audit_log)
                            <tr>
                                <td>{{ $audit_log->id }}</td>
                                <td class="text-center">{{ $audit_log->description }}</td>
                                <td class="text-center">{{ $audit_log->auditable_type }}</td>
                                <td class="text-center">{{ $audit_log->auditable_id }}</td>
                                <td class="text-center">{{ $audit_log->user->full_name ?? '' }}</td>
                                <td class="text-center">{{ $audit_log->host }}</td>
                                <td class="text-center">{{ $audit_log->created_at->format('Y-m-d') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('audit_logs.show', $audit_log) }}" class="btn btn-sm btn-dark">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="text-sm text-center text-danger">
                                    No audit log found
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                @if($audit_logs->lastPage() > 1)
                    <div class="card-footer">
                        <div class="float-right">
                            {{ $audit_logs->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
