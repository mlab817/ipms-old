@extends('layouts.admin')

@section('breadcrumb')
    @include('includes.breadcrumb', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard'),
        'Login Activity' => null,
]
])
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Login Activity</strong>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Host</th>
                    <th>Logged in</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($logins as $login)
                        <tr>
                            <td>{{ $login->id }}</td>
                            <td>{{ $login->ip }}</td>
                            <td>{{ $login->created_at->diffForHumans(null, null, true) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {!! $logins->links() !!}
        </div>
    </div>
@stop
