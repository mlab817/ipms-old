@extends('layouts.admin')

@section('breadcrumb')
    @include('includes.breadcrumb', [
        'breadcrumbs' => [
            'Dashboard' => route('dashboard'),
            'Admin' => route('admin.index'),
            'Users' => null
]
    ])
@stop

@section('content')
    <section class="content">
        <livewire:users-table />
    </section>
@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
