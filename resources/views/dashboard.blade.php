@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.css" />
@endsection

@section('content')
    <div class="Layout Layout--sidebarPosition-end Layout--sidebar-wide">
        <div class="Layout-main">
            <div class="">
                <h2 class="mt-5 f4 text-normal pt-md-3">Activities</h2>

                <div class="mt-4" style="overflow-x: auto;">
                    <div id="chart3"></div>
                </div>

                @if(count($pinnedProjects))
                    <h2 class="mt-5 f4 text-normal pt-md-3">Pinned PAPs</h2>

                    <ol class="d-flex flex-wrap list-style-none gutter-condensed mb-4 mt-4">
                        @foreach($pinnedProjects as $project)
                            <li class="col-lg-6 col-md-12">
                                <div class="Box p-3 mt-2">
                                    <div>
                                        <div class="f5 lh-condensed text-bold color-text-primary">
                                            <a class="Link--primary flex-auto no-underline text-bold" href="{{ route('projects.show', $project) }}">
                                                {{ $project->title }}
                                            </a>
                                            <div class="float-right d-inline-block">
                                                <form action="{{ route('projects.togglePin', $project) }}" accept-charset="UTF-8" method="post"><input type="hidden" name="authenticity_token" value="ubEg7wzqrO1GSwMrJIuzuYtR3LKcWc1dzeglGMzQ/kbURBOOu5hHkl6mw6l040253vWFxiNd4nSXBVrmyybvcg==">
                                                    @csrf
                                                    <button name="button" type="submit" class="btn btn-sm ml-2 mb-2" aria-label="Toggle pin" title="Toggle pin">
                                                        @if(auth()->user()->pinned_projects->contains($project))
                                                            <svg class="octicon octicon-bookmark-slash mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M1.19 1.143a.75.75 0 10-.88 1.214L3 4.305v9.945a.75.75 0 001.206.596L8 11.944l3.794 2.902A.75.75 0 0013 14.25v-2.703l1.81 1.31a.75.75 0 10.88-1.214l-2.994-2.168a1.09 1.09 0 00-.014-.01L4.196 3.32a.712.712 0 00-.014-.01L1.19 1.143zM4.5 5.39v7.341l3.044-2.328a.75.75 0 01.912 0l3.044 2.328V10.46l-7-5.07zM5.865 1a.75.75 0 000 1.5h5.385a.25.25 0 01.25.25v3.624a.75.75 0 001.5 0V2.75A1.75 1.75 0 0011.25 1H5.865z"></path></svg>
                                                            Unpin
                                                        @else
                                                            <svg class="octicon octicon-bookmark mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M4.75 2.5a.25.25 0 00-.25.25v9.91l3.023-2.489a.75.75 0 01.954 0l3.023 2.49V2.75a.25.25 0 00-.25-.25h-6.5zM3 2.75C3 1.784 3.784 1 4.75 1h6.5c.966 0 1.75.784 1.75 1.75v11.5a.75.75 0 01-1.227.579L8 11.722l-3.773 3.107A.75.75 0 013 14.25V2.75z"></path></svg>
                                                            Pin
                                                        @endif
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="color-text-secondary mt-1">
                                            <p>{{ first_sentence($project->description->description ?? '_No description_') }}</p>
                                        </div>

                                        <p class="f6 color-text-secondary mt-2 mb-0">
                                    <span class="mr-3 f6 color-text-secondary text-normal">
                                        <span class="repo-language-color @if($project->pap_type_id == 1) color-bg-success @else color-bg-danger @endif mr-1"></span>
                                        <span itemprop="pap-type">{{ $project->pap_type->name ?? '_' }}</span>
                                    </span>

                                            <span class="d-inline-block mr-3">
                                        <span class="mr-1 f6 color-text-secondary text-normal">
                                            <svg role="img" class="octicon octicon-credit-card" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M10.75 9a.75.75 0 000 1.5h1.5a.75.75 0 000-1.5h-1.5z"></path><path fill-rule="evenodd" d="M0 3.75C0 2.784.784 2 1.75 2h12.5c.966 0 1.75.784 1.75 1.75v8.5A1.75 1.75 0 0114.25 14H1.75A1.75 1.75 0 010 12.25v-8.5zm14.5 0V5h-13V3.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25zm0 2.75h-13v5.75c0 .138.112.25.25.25h12.5a.25.25 0 00.25-.25V6.5z"></path></svg>
                                            {{ 'PhP ' . shorten_value($project->total_project_cost) }}
                                        </span>
                                    </span>

                                            <span class="d-inline-block mr-3">
                                            <svg role="img" class="octicon octicon-clock mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM8 0a8 8 0 100 16A8 8 0 008 0zm.5 4.75a.75.75 0 00-1.5 0v3.5a.75.75 0 00.471.696l2.5 1a.75.75 0 00.557-1.392L8.5 7.742V4.75z"></path></svg>
                                            Updated {{ $project->updated_at->format('Y M d') }}
                                    </span>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                @endif

                <div class="d-flex flex-justify-between mt-5 pt-md-3 pb-2">
                    <h2 class="f4 text-normal">
                        Your PAPs
                    </h2>
                    <a href="{{ route('users.projects', auth()->user()) }}" class="Link--muted no-underline">View More</a>
                </div>

                @if(count($ownedProjects))
                <!-- Projects boxes -->
                    <ol class="d-flex flex-wrap list-style-none gutter-condensed mb-4 mt-4">
                        @foreach($ownedProjects as $project)
                            <li class="col-lg-6 col-md-12">
                                <div class="Box p-3 mt-2">
                                    <div>
                                        <div class="f5 lh-condensed text-bold color-text-primary">
                                            <a class="Link--primary flex-auto no-underline text-bold" href="{{ route('projects.show', $project) }}">
                                                {{ $project->title }}
                                            </a>
                                            <div class="float-right d-inline-block">
                                                <form action="{{ route('projects.togglePin', $project) }}" accept-charset="UTF-8" method="post"><input type="hidden" name="authenticity_token" value="ubEg7wzqrO1GSwMrJIuzuYtR3LKcWc1dzeglGMzQ/kbURBOOu5hHkl6mw6l040253vWFxiNd4nSXBVrmyybvcg==">
                                                    @csrf
                                                    <button name="button" type="submit" class="btn btn-sm ml-2 mb-2" aria-label="Toggle pin" title="Toggle pin">
                                                        @if(auth()->user()->pinned_projects->contains($project))
                                                            <svg class="octicon octicon-bookmark-slash mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M1.19 1.143a.75.75 0 10-.88 1.214L3 4.305v9.945a.75.75 0 001.206.596L8 11.944l3.794 2.902A.75.75 0 0013 14.25v-2.703l1.81 1.31a.75.75 0 10.88-1.214l-2.994-2.168a1.09 1.09 0 00-.014-.01L4.196 3.32a.712.712 0 00-.014-.01L1.19 1.143zM4.5 5.39v7.341l3.044-2.328a.75.75 0 01.912 0l3.044 2.328V10.46l-7-5.07zM5.865 1a.75.75 0 000 1.5h5.385a.25.25 0 01.25.25v3.624a.75.75 0 001.5 0V2.75A1.75 1.75 0 0011.25 1H5.865z"></path></svg>
                                                            Unpin
                                                        @else
                                                            <svg class="octicon octicon-bookmark mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M4.75 2.5a.25.25 0 00-.25.25v9.91l3.023-2.489a.75.75 0 01.954 0l3.023 2.49V2.75a.25.25 0 00-.25-.25h-6.5zM3 2.75C3 1.784 3.784 1 4.75 1h6.5c.966 0 1.75.784 1.75 1.75v11.5a.75.75 0 01-1.227.579L8 11.722l-3.773 3.107A.75.75 0 013 14.25V2.75z"></path></svg>
                                                            Pin
                                                        @endif
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="color-text-secondary mt-1">
                                            <p>{{ first_sentence($project->description->description ?? '_No description_') }}</p>
                                        </div>

                                        <p class="f6 color-text-secondary mt-2 mb-0">
                                        <span class="mr-3 f6 color-text-secondary text-normal">
                                            <span class="">
                                                <span class="repo-language-color @if($project->pap_type_id == 1) color-bg-success @else color-bg-danger @endif mr-1"></span>
                                                <span itemprop="pap-type">{{ $project->pap_type->name ?? '_' }}</span>
                                            </span>
                                        </span>

                                        <span class="d-inline-block mr-3">
                                            <span class="mr-2 f6 color-text-secondary text-normal">
                                                <svg role="img" class="octicon octicon-credit-card mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M10.75 9a.75.75 0 000 1.5h1.5a.75.75 0 000-1.5h-1.5z"></path><path fill-rule="evenodd" d="M0 3.75C0 2.784.784 2 1.75 2h12.5c.966 0 1.75.784 1.75 1.75v8.5A1.75 1.75 0 0114.25 14H1.75A1.75 1.75 0 010 12.25v-8.5zm14.5 0V5h-13V3.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25zm0 2.75h-13v5.75c0 .138.112.25.25.25h12.5a.25.25 0 00.25-.25V6.5z"></path></svg>
                                                {{ 'PhP ' . shorten_value($project->total_project_cost) }}
                                            </span>
                                        </span>

                                        <span class="d-inline-block mr-3">
                                            <span class="mr-2 f6 color-text-secondary text-normal">
                                                <svg role="img" class="octicon octicon-issue-opened open mr-1" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path><path fill-rule="evenodd" d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path></svg>
                                                <a class="Link--muted no-underline" href="{{ route('projects.issues.index', $project) }}">
                                                {{ $project->issues()->open()->count() }} issues
                                                </a>
                                            </span>
                                        </span>

                                        <span class="d-inline-block mr-3">
                                            <svg role="img" class="octicon octicon-clock mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM8 0a8 8 0 100 16A8 8 0 008 0zm.5 4.75a.75.75 0 00-1.5 0v3.5a.75.75 0 00.471.696l2.5 1a.75.75 0 00.557-1.392L8.5 7.742V4.75z"></path></svg>
                                            Updated {{ $project->updated_at->format('Y M d') }}
                                        </span>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                @else
                    <div class="Box">
                        <x-blankslate message="You do not own any project" />
                    </div>
                @endif

{{--                <div id="chart" style="width: 100%;"></div>--}}

{{--                <div id="chart2" style="width: 100%;"></div>--}}
            </div>

            <div class="mb-5"></div>
        </div>

        <div class="Layout-sidebar">
            <aside class="mt-5 hide-lg hide-md hide-sm px-4">
                <h2 class="f5 text-bold mb-1">Explore</h2>

                @foreach ($randomProjects as $project)
                    <div class="py-2 my-2 border-bottom color-border-secondary">
                        <p class="f6 color-text-secondary mb-2">
                            <a class="f6 text-bold Link--primary d-flex no-underline wb-break-all d-inline-block" href="{{ route('projects.show', $project) }}">
                                <span>{{ $project->title }}</span>
                                {{ '#' . $project->id }}
                            </a>
                        </p>

                        <span class="mr-2 f6 color-text-secondary text-normal">
                            <span class="">
                                <span class="repo-language-color @if($project->pap_type_id == 1) color-bg-success @else color-bg-danger @endif mr-1"></span>
                                <span itemprop="pap-type">{{ $project->pap_type->name ?? '_' }}</span>
                            </span>
                        </span>

                        <span class="mr-2 f6 color-text-secondary text-normal">
                            <svg role="img" class="octicon octicon-credit-card" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M10.75 9a.75.75 0 000 1.5h1.5a.75.75 0 000-1.5h-1.5z"></path><path fill-rule="evenodd" d="M0 3.75C0 2.784.784 2 1.75 2h12.5c.966 0 1.75.784 1.75 1.75v8.5A1.75 1.75 0 0114.25 14H1.75A1.75 1.75 0 010 12.25v-8.5zm14.5 0V5h-13V3.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25zm0 2.75h-13v5.75c0 .138.112.25.25.25h12.5a.25.25 0 00.25-.25V6.5z"></path></svg>
                            {{ shorten_value($project->total_project_cost) }}
                        </span>

                        <span class="f6 color-text-secondary text-normal">
                            <svg role="img" class="octicon octicon-clock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM8 0a8 8 0 100 16A8 8 0 008 0zm.5 4.75a.75.75 0 00-1.5 0v3.5a.75.75 0 00.471.696l2.5 1a.75.75 0 00.557-1.392L8.5 7.742V4.75z"></path></svg>
                            {{ $project->updated_at->diffForHumans(null, null, true) }}
                        </span>
                    </div>
                @endforeach
            </aside>
        </div>
    </div>


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

    <script type="text/javascript" src="//d3js.org/d3.v3.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.min.js"></script>

    <script type="text/javascript">
        const cal = new CalHeatMap();

        const data = @json($activities);

        const reduced = {}

        if (data.length) {
            data.forEach(d => {
                reduced[Object.keys(d)[0]] = Object.values(d)[0]
            })
        }

        cal.init({
            itemSelector: '#chart3',
            domain: 'month',
            subDomain: 'x_day',
            data: reduced,
            start: new Date(2020, 12, 1),
            cellSize: 12,
            range: 12,
            displayLegend: false,
            highlight: ['now']
            // legend: [20, 40, 60, 80]
        });
    </script>
@endpush
