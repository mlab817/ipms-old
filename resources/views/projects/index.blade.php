@extends('layouts.app')

@section('yield', 'Projects')

@section('content')
    <div>
        <livewire:project-overview />
    </div>
@stop

@section('styles')
    <!-- the following will apply to the octicon search button -->
    <style lang="scss">
        .auto-search-group {
            position:relative;
        }

        .auto-search-group .auto-search-input {
            padding-left:30px;
        }

        .auto-search-group .spinner, .auto-search-group>.octicon {
            height:16px;
            left:10px;
            position:absolute;
            width:16px;
            z-index:5;
        }

        .auto-search-group .spinner{
            background-color:var(--color-bg-primary);
            top:9px;
        }

        .auto-search-group>.octicon{
            color:var(--color-icon-secondary);
            font-size: 14px;
            text-align: center;
            top: 10px;
        }

        .btn-link {
            color: var(--color-text-secondary);
        }
    </style>
@stop
