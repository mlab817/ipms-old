@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Export Data</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Export Data</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h1 class="card-title">Export Data</h1>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            @php
                                $i = 1;
                            @endphp
                            @forelse($links as $link)
                                <a class="list-group-item list-group-item-action" href="{{ $link['link'] }}">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $i++ . '. ' . $link['title'] }}</h5>
                                    </div>
                                    <p class="mb-1">{{ $link['desc'] }}</p>
{{--                                    <small>Donec id elit non mi porta.</small>--}}
                                </a>
                            @empty
                                <li class="list-group-item">Nothing here.</li>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
