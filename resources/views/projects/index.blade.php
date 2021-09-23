@extends('layouts.header-only')

@section('title', 'Projects')

@section('content')
    <div class="color-bg-secondary border-bottom">
        <div class="container-lg d-flex flex-justify-between py-6">
            <div class="flex-auto">
                <h1 class="h1">Projects</h1>
            </div>
            <div class="d-flex flex-items-center">
                <div id="chart"></div>
            </div>
        </div>
    </div>

    <div class="container-lg mx-auto">

        <!-- Search Bar --> <!-- Sorter -->

        <!-- List -->
        <div>
            @forelse($projects as $project)
            <ul>
                <li class="col-12 d-flex width-full py-4 border-bottom color-border-secondary public source">
                    <div class="d-inline-block">
                        <div class="d-inline-block mb-1">
                            <h3 class="wb-break-all">
                                <a href="{{ route('projects.show', $project) }}">
                                    {{ $project->title }}
                                </a>
                                <span class="Label Label--secondary v-align-middle ml-1 mb-1">
                                    {{ $project->pap_type->name ?? '' }}
                                </span>
                            </h3>
                        </div>

                        <div>
                            <p class="d-inline-block color-text-secondary mb-2 pr-4">
                                {!! first_sentence($project->description->description ?? '') !!}
                            </p>
                        </div>

                        <div class="f6 color-text-secondary mt-2">
                            <span class="ml-0 mr-3">
                                <span class="repo-language-color" style="background-color: #4F5D95"></span>
                                <span>
                                    {{ $project->office->acronym ?? '' }}
                                </span>
                            </span>

                            <span class="ml-0 mr-3">
                                <span class="repo-language-color" style="background-color: #4F5D95"></span>
                                <span>
                                    PhP {{ format_money($project->total_project_cost) }}
                                </span>
                            </span>

                            Updated <x-time-ago time="{{ $project->updated_at }}"></x-time-ago>
                        </div>
                    </div>
                </li>
            </ul>
            @empty
                <x-blankslate></x-blankslate>
            @endforelse
        </div>

        <div class="paginate-container">
            {{ $projects->links() }}
        </div>

    </div>
{{--    <livewire:project-overview />--}}
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
