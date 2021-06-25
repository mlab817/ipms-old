@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Announcements</strong>
            <a href="{{ route('admin.announcements.create') }}" class="btn btn-sm btn-success">Create</a>
        </div>
        <div class="card-body p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px" class="text-nowrap">ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Expires on</th>
                        <th style="width: 10px;" class="text-center text-nowrap">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($announcements as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{!! $item->content !!}</td>
                            <td>{{ $item->expires_at ? $item->expires_at->format('Y M d') : '' }}</td>
                            <td>
                                <a href="{{ route('admin.announcements.edit', $item) }}" class="btn btn-sm btn-dark">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="100%">No announcements added</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {!! $announcements->links() !!}
        </div>
    </div>
@stop
