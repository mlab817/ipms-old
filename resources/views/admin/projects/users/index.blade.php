@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h1 class="card-title">Manage Access</h1>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-primary" href="{{ route('admin.projects.users.create', $project->uuid) }}">Add User</a>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>User</td>
                                        <td class="text-center">Read</td>
                                        <td class="text-center">Update</td>
                                        <td class="text-center">Delete</td>
                                        <td class="text-center">Review</td>
                                        <td class="text-center">Comment</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td class="text-center">
                                            @if($user->pivot->read)
                                                <i class="text-primary fas fa-check-square"></i>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($user->pivot->update)
                                                <i class="text-primary fas fa-check-square"></i>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($user->pivot->delete)
                                                <i class="text-primary fas fa-check-square"></i>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($user->pivot->review)
                                                <i class="text-primary fas fa-check-square"></i>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($user->pivot->comment)
                                                <i class="text-primary fas fa-check-square"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('admin.projects.users.edit', ['project' => $project->uuid, 'user' => $user]) }}">Edit</a>
                                            <form action="{{ route('admin.projects.users.destroy', ['project' => $project->uuid, 'user' => $user]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
                                        No Users added.
                                            <a href="{{ route('admin.projects.users.create', $project->uuid) }}">Add now</a>.
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
