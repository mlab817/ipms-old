<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {!! $search ? 'Showing results for <strong>' . $search .'</strong>' : '' !!}
                    <div class="card-header-actions">
                        <input wire:model="search" class="form-control form-control-sm" type="search" placeholder="Search Projects..." style="width: 200px;">
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
                                <a wire:click.prevent="sortBy('title')" role="button" href="#">
                                    Title
                                    @include('includes.sort-icon', ['field' => 'title'])
                                </a>
                            </th>
                            <th class="text-right text-sm text-nowrap">
                                <a wire:click.prevent="sortBy('total_project_cost')" role="button" href="#">
                                    Total Project Cost
                                    @include('includes.sort-icon', ['field' => 'total_project_cost'])
                                </a>
                            </th>
                            <th class="text-center text-sm text-nowrap">
                                <a wire:click.prevent="sortBy('project_status_id')" role="button" href="#">
                                    Project Status
                                    @include('includes.sort-icon', ['field' => 'project_status_id'])
                                </a>
                            </th>
                            <th class="text-center text-sm text-nowrap">
                                <a wire:click.prevent="sortBy('office_id')" role="button" href="#">
                                    Office
                                    @include('includes.sort-icon', ['field' => 'office_id'])
                                </a>
                            </th>
                            <th class="text-center text-sm text-nowrap">
                                <a wire:click.prevent="sortBy('submission_status_id')" role="button" href="#">
                                    Submission Status
                                    @include('includes.sort-icon', ['field' => 'submission_status_id'])
                                </a>
                            </th>
                            <th class="text-center text-sm text-nowrap">
                                <a wire:click.prevent="sortBy('created_by')" role="button" href="#">
                                    Added By
                                    @include('includes.sort-icon', ['field' => 'created_by'])
                                </a>
                            </th>
                            <th class="text-center text-sm text-nowrap">
                                <a wire:click.prevent="sortBy('updated_at')" role="button" href="#">
                                    Updated at
                                    @include('includes.sort-icon', ['field' => 'updated_at'])
                                </a>
                            </th>
                            <th class="text-center text-sm">
                                Edit
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($projects as $project)
                            <tr>
                                <td class="text-center text-sm">{{ $project->id }}</td>
                                <td class="text-sm text-center">
                                    {!! $search ? preg_replace('/(' . $search . ')/i', "<span class=\"bg-yellow\">$1</span>", $project->title) : $project->title !!}
                                </td>
                                <td class="text-sm text-right">{{ number_format($project->total_project_cost) }}</td>
                                <td class="text-sm text-center">{{ $project->project_status_name }}</td>
                                <td class="text-sm text-center">{{ optional($project->office)->acronym }}</td>
                                <td class="text-sm text-center">
                                    {{ optional($project->submission_status)->name }}
                                </td>
                                <td class="text-sm text-center text-nowrap">
                                    {!! optional($project->creator)->first_name !!} <br/>
                                    <span class="text-muted">{{ optional($project->creator->office)->acronym }}</span>
                                </td>
                                <td class="text-sm text-center">{{ $project->updated_at ? $project->updated_at->diffForHumans(null, null, true) : '' }}</td>
                                <td class="text-sm text-center">
                                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-sm btn-dark">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="text-sm text-center text-danger">
                                    No project found
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                @if($projects->lastPage() > 1)
                    <div class="card-footer">
                        <div class="float-right">
                            {{ $projects->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
