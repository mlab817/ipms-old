<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <input wire:model="search" class="form-control form-control-sm" type="text" placeholder="Search Users..." style="width: 200px;">
                    </div>
                </div>
                <div class="card-body p-0">
                    @if ($projects->count())
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-center text-sm">
                                    #
                                </th>
                                <th class="text-center text-sm">
                                    <a wire:click.prevent="sortBy('name')" role="button" href="#">
                                        Name
                                        @include('includes.sort-icon', ['field' => 'name'])
                                    </a>
                                </th>
                                <th class="text-center text-sm">
                                    <a wire:click.prevent="sortBy('email')" role="button" href="#">
                                        Email
                                        @include('includes.sort-icon', ['field' => 'email'])
                                    </a>
                                </th>
                                <th class="text-center text-sm">
                                    <a wire:click.prevent="sortBy('office_id')" role="button" href="#">
                                        Office
                                        @include('includes.sort-icon', ['field' => 'office_id'])
                                    </a>
                                </th>
                                <th class="text-center text-sm">
                                    <a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                                        Created at
                                        @include('includes.sort-icon', ['field' => 'created_at'])
                                    </a>
                                </th>
                                <th class="text-center text-sm">
                                    Edit
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td class="text-center text-sm">{{ $project->id }}</td>
                                    <td class="text-sm text-center">{{ $project->title }}</td>
                                    <td class="text-sm text-center">{{ $project->email }}</td>
                                    <td class="text-sm text-center">{{ optional($project->office)->acronym }}</td>
                                    <td class="text-sm text-center">{{ $project->created_at->format('m-d-Y') }}</td>
                                    <td class="text-sm text-center">
                                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-sm btn-dark">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning">
                            Your query returned zero results.
                        </div>
                    @endif
                </div>
                @if($projects->hasMorePages())
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
