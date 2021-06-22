@extends('layouts.admin')

@section('breadcrumb')
    @include('includes.breadcrumb', [
        'breadcrumbs' => [
            'Dashboard' => route('dashboard'),
            'Admin' => route('admin.projects.index'),
            'Manage Projects' => null
]
    ])
@stop

@section('content')
    <livewire:manage-projects-table />
@stop
