@extends('layouts.app')

@section('content')
    <div class="flex-shrink-0 col-12 col-md-9 mb-4 mb-md-0">
        <div>

            <div class="position-relative">

                <div class="mt-4">
                    <div class="js-pinned-items-reorder-container">
                        <h2 class="f4 mb-2 text-normal">
                            Pinned PAPs
                        </h2>

                        @if(count($pinnedProjects))
                            <!-- Projects boxes -->
                            <ol class="d-flex flex-wrap list-style-none gutter-condensed mb-4">
                                @foreach($pinnedProjects as $project)
                                <li class="mb-3 d-flex flex-content-stretch col-12 col-md-6 col-lg-6">
                                    <div class="Box pinned-item-list-item d-flex p-3 width-full public source">
                                        <div class="pinned-item-list-item-content">
                                            <div class="d-flex width-full flex-items-center position-relative">
                                                <a href="{{ route('projects.show', $project) }}" class="text-bold flex-auto min-width-0">
                                                    <span class="repo" title="ipms-docs">{{ $project->title }}</span>
                                                </a>
                                                <span class="Label Label--secondary v-align-middle">
                                                    {{ $project->submission_status->name ?? '' }}
                                                </span>
                                            </div>

                                            <p class="pinned-item-desc color-text-secondary text-small d-block mt-2 mb-3">
                                                {!! strip_tags(Str::limit($project->description->description, 180)) !!}
                                            </p>

                                            <p class="mb-0 f6 color-text-secondary">
                                                <span class="d-inline-block mr-3">
                                                    <span class="repo-language-color" style="background-color: #f1e05a"></span>
                                                    <span itemprop="programmingLanguage">
                                                        {{ $project->pap_type->name ?? '' }}
                                                    </span>
                                                </span>
                                                <span href="/mlab817/lighthouse-graphql-permission/stargazers" class="pinned-item-meta Link--muted ">
                                                    PhP
                                                    {{ number_format($project->total_project_cost, 2) }}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ol>
                        @else
                            <div class="Box">
                                <x-blankslate message="You have not pinned any program/projects. Pin projects for easier and faster access." />
                            </div>
                        @endif

                        <!-- ./ Projects boxes -->
                    </div>

                </div>

                <div class="mt-4">
                    <div class="js-pinned-items-reorder-container">
                        <h2 class="f4 mb-2 text-normal">
                            My PAPs
                        </h2>

                    @if(count($ownedProjects))
                        <!-- Projects boxes -->
                            <ol class="d-flex flex-wrap list-style-none gutter-condensed mb-4">
                                @foreach($ownedProjects as $project)
                                    <li class="mb-3 d-flex flex-content-stretch col-12 col-md-6 col-lg-6">
                                        <div class="Box pinned-item-list-item d-flex p-3 width-full public source">
                                            <div class="pinned-item-list-item-content">
                                                <div class="d-flex width-full flex-items-center position-relative">
                                                    <a href="{{ route('projects.show', $project) }}" class="text-bold flex-auto min-width-0">
                                                        <span class="repo" title="ipms-docs">{{ $project->title }}</span>
                                                    </a>
                                                    <span class="Label Label--secondary v-align-middle">
                                                    {{ $project->submission_status->name ?? '' }}
                                                </span>
                                                </div>

                                                <p class="pinned-item-desc color-text-secondary text-small d-block mt-2 mb-3">
                                                    {!! strip_tags(Str::limit($project->description->description, 180)) !!}
                                                </p>

                                                <p class="mb-0 f6 color-text-secondary">
                                                <span class="d-inline-block mr-3">
                                                    <span class="repo-language-color" style="background-color: #f1e05a"></span>
                                                    <span itemprop="programmingLanguage">
                                                        {{ $project->pap_type->name ?? '' }}
                                                    </span>
                                                </span>
                                                    <span href="/mlab817/lighthouse-graphql-permission/stargazers" class="pinned-item-meta Link--muted ">
                                                    PhP
                                                    {{ number_format($project->total_project_cost, 2) }}
                                                </span>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        @else
                            <div class="Box">
                                <x-blankslate message="You have not pinned any program/projects. Pin projects for easier and faster access." />
                            </div>
                    @endif

                    <!-- ./ Projects boxes -->
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div id="chart"></div>

    <div id="chart2"></div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        const options = {
            series: @json($chart['series']),
            labels: @json($chart['labels']),
            chart: {
                height: 350,
                type: 'bar',
                stacked: false,
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            fill: {
                // opacity: [0.85, 0.25, 1],
                gradient: {
                    inverseColors: false,
                    shade: 'light',
                    type: "vertical",
                    // opacityFrom: 0.85,
                    // opacityTo: 0.55,
                    stops: [0, 100, 100, 100]
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            markers: {
                size: 0
            },
            xaxis: {
                type: 'number'
            },
            yaxis: {
                title: {
                    text: 'million pesos',
                },
                min: 0,
                forceNiceScale: true
            },
            title: {
                text: 'Comparison of Investment Requirements per Updating Period'
            },
            tooltip: {
                shared: true,
                intersect: false,
                y: {
                    formatter: function (y) {
                        if (typeof y !== "undefined") {
                            return y.toLocaleString() + " pesos";
                        }
                        return y;

                    }
                }
            }
        };

        const chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();

        const options2 = {
            series: [
                {
                    data: @json($treeMap)
                }
            ],
            chart: {
                height: 450,
                type: 'treemap',
                treemap: {
                    distributed: true,
                    colorScale: {
                        ranges: [
                            {
                                from: -6,
                                to: 0,
                                color: '#CD363A'
                            },
                            {
                                from: 0.001,
                                to: 6,
                                color: '#52B12C'
                            }
                        ]
                    }
                }
            },
            title: {
                text: 'Top 25 PAPs based on Cost'
            },
            legend: {
                show: false
            }
        };

        const chart2 = new ApexCharts(document.querySelector("#chart2"), options2);

        chart2.render()
    </script>
@endpush
