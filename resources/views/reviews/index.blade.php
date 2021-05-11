@extends('layouts.admin')

@section('content')
    <div class="mt-3"></div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-body">
                    {{ $dataTable->table(['width' => '100%','class' => 'table table-striped']) }}
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
