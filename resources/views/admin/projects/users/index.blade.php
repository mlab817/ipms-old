@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Project Access</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">Manage Projects</a></li>
                        <li class="breadcrumb-item active">Manage Project Access</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h1 class="card-title">{{ $project->title }}</h1><br/>
                            by <strong>{{ $project->office->name ?? '-' }}</strong>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-info" href="{{ route('admin.projects.changeOwner.get', $project) }}">Change Owner</a>
                            <a class="btn btn-primary" href="{{ route('admin.projects.users.create', $project) }}">Add User</a>
                            <table class="table table-striped table-valign-middle">
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
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm text-success" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($user->pivot->update)
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm text-success" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($user->pivot->delete)
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm text-success" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($user->pivot->review)
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm text-success" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($user->pivot->comment)
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm text-success" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="row">
                                                <a class="btn btn-info btn-sm" href="{{ route('admin.projects.users.edit', ['project' => $project->uuid, 'user' => $user]) }}">Edit</a>
                                                <form action="{{ route('admin.projects.users.destroy', ['project' => $project->uuid, 'user' => $user]) }}" method="POST" class="ml-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
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
                        <div class="card-footer">
                            <a href="{{ route('admin.projects.index') }}" class="btn">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
