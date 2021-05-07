@extends('layouts.admin')

@section('content')
    <div class="mt-3"></div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h1 class="card-title">Review Projects</h1>
                </div>
                <div class="card-body">
                    {{ $dataTable->table(['width' => '100%']) }}
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    {{ $dataTable->scripts() }}
@endpush
