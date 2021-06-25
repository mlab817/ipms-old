@extends('layouts.admin')

@section('breadcrumb')
    @include('includes.breadcrumb', [
        'breadcrumbs' => [
            'Dashboard' => route('dashboard'),
            'Admin' => route('admin.index'),
            'Links' => null
]
    ])
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Links</strong>
            <a href="{{ route('admin.links.create') }}" class="btn btn-success btn-sm">Create</a>
        </div>
        <div class="card-body p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center text-sm">ID</th>
                        <th class="text-center text-sm">Title <br/> <small>Click to view</small></th>
                        <th class="text-center text-sm">Description</th>
                        <th class="text-center text-sm">Edit</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($links as $link)
                    <tr>
                        <td>{{ $link->id }}</td>
                        <td>
                            <a href="{{ $link->url }}" target="_blank">{{ $link->title }}</a>
                        </td>
                        <td>{{ $link->description }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.links.edit', $link) }}" class="btn btn-dark btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @if($links->lastPage() > 1)
        <div class="card-footer">
            {!! $links->links() !!}
        </div>
        @endif
    </div>
@endsection
