@extends('layouts.project')

@section('content')
    <div class="Subhead hx_Subhead--responsive">
        <h1 class="Subhead-heading">Comparing changes</h1>

        <div class="Subhead-description">
            Choose two versions to see what’s changed.
        </div>
    </div>

    @if(! $original)
        <x-dismissable-flash-message type="error" message="No project to compare with"></x-dismissable-flash-message>
    @endif

    <div class="Box v-align-middle color-text-secondary py-2 px-3 mt-4">
        <div class="d-inline-flex">
            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-git-compare flex-self-center mr-3" style="vertical-align: center !important;">
                <path fill-rule="evenodd" d="M9.573.677L7.177 3.073a.25.25 0 000 .354l2.396 2.396A.25.25 0 0010 5.646V4h1a1 1 0 011 1v5.628a2.251 2.251 0 101.5 0V5A2.5 2.5 0 0011 2.5h-1V.854a.25.25 0 00-.427-.177zM6 12v-1.646a.25.25 0 01.427-.177l2.396 2.396a.25.25 0 010 .354l-2.396 2.396A.25.25 0 016 15.146V13.5H5A2.5 2.5 0 012.5 11V5.372a2.25 2.25 0 111.5 0V11a1 1 0 001 1h1zm6.75 0a.75.75 0 100 1.5.75.75 0 000-1.5zM4 3.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"></path>
            </svg>

            <details class="select-menu details-reset details-overlay mr-3">
                <summary role="button" class="select-menu-button btn-sm btn" aria-haspopup="menu">
                    <span class="css-truncate css-truncate-target" data-menu-button="" title="base: mlab817/ipms-v2">mlab817/ipms-v2</span>
                </summary>
                <details-menu class="select-menu-modal position-absolute" style="z-index: 99;" data-pjax="" src="/mlab817/ipms-v2/compare/repository-list?range=primer&amp;selected=mlab817%2Fipms-v2&amp;type=base" preload="" role="menu">
                    <include-fragment>
                        <svg style="box-sizing: content-box; color: var(--color-icon-primary);" width="32" height="32" viewBox="0 0 16 16" fill="none" class="my-6 mx-auto d-block anim-rotate">
                            <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                            <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                        </svg>
                    </include-fragment>
                </details-menu>
            </details>

            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-arrow-left flex-self-center mr-3">
                <path fill-rule="evenodd" d="M7.78 12.53a.75.75 0 01-1.06 0L2.47 8.28a.75.75 0 010-1.06l4.25-4.25a.75.75 0 011.06 1.06L4.81 7h7.44a.75.75 0 010 1.5H4.81l2.97 2.97a.75.75 0 010 1.06z"></path>
            </svg>

            <details class="select-menu fork-suggester details-reset details-overlay">
                <summary role="button" class="select-menu-button btn-sm btn" aria-haspopup="menu">
                    <span class="css-truncate css-truncate-target" data-menu-button="" title="head: mlab817/ipms-v2">mlab817/ipms-v2</span>
                </summary>
                <details-menu class="select-menu-modal position-absolute" style="z-index: 99;" data-pjax="" src="/mlab817/ipms-v2/compare/repository-list?range=primer&amp;selected=mlab817%2Fipms-v2&amp;type=head" preload="" role="menu">
                    <include-fragment>
                        <svg style="box-sizing: content-box; color: var(--color-icon-primary);" width="32" height="32" viewBox="0 0 16 16" fill="none" class="my-6 mx-auto d-block anim-rotate">
                            <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                            <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                        </svg>
                    </include-fragment>
                </details-menu>
            </details>
        </div>
    </div>

    <div class="Box mt-5">
        <div class="Box-header">
            <h1 class="Box-title">Regional Investments</h1>
        </div>
        <div class="Box-body">
            <div id="chart1" style="width: 100%;">
                    <span class="loading">
                        <span>Loading</span><span class="AnimatedEllipsis"></span>
                    </span>
            </div>
        </div>
    </div>

    <div class="Box mt-5">
        <div class="Box-header">
            <h1 class="Box-title">Funding Source Investments</h1>
        </div>
        <div class="Box-body">
            <div id="chart2" style="width: 100%;">
                    <span class="loading">
                        <span>Loading</span><span class="AnimatedEllipsis"></span>
                    </span>
            </div>
        </div>
    </div>

    <div class="Box mt-5 mb-5">
        <div class="Box-header">
            <h1 class="Box-title">Financial Accomplishments</h1>
        </div>
        <div class="Box-body p-0">
            <div class="Box-row">

                <div id="chart5" style="width: 100%;">
                    <span class="loading">
                        <span>Loading</span><span class="AnimatedEllipsis"></span>
                    </span>
                </div>
            </div>
            <div class="Box-row">
                <div id="chart6" style="width: 100%;">
                    <span class="loading">
                        <span>Loading</span><span class="AnimatedEllipsis"></span>
                    </span>
                </div>
            </div>
            <div class="Box-row">
                <div id="chart7" style="width: 100%;">
                    <span class="loading">
                        <span>Loading</span><span class="AnimatedEllipsis"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        const baseOptions = {
            xaxis: {
                categories: @json($labels)
            },
            dataLabels: {
                enabled: false
            },
            chart: {
                type: 'bar',
                height: '350',
                toolbar: {
                    show: false,
                },
                events: {
                    mounted: function(chartContext, config) {
                        let elements = document.getElementsByClassName('loading')
                        for (let i = 0; i < elements.length; i++){
                            let elements = document.getElementsByClassName('loading');
                            if (elements[i].style.visibility === "hidden") {
                                elements[i].style.visibility = "";
                            } else {
                                elements[i].style.visibility = "hidden";
                            }
                        }
                    }
                }
            },
            title: {
                text: undefined,
                align: 'center',
                margin: 10,
                offsetX: 0,
                offsetY: 0,
                floating: false,
                style: {
                    fontSize:  '14px',
                    fontWeight:  'bold',
                    fontFamily:  undefined,
                    color:  '#263238'
                },
            }
        }

        const options1 = baseOptions;
        options1.series = @json($compareRegionInvestments);
        options1.title.text = 'Previous vs. Current Region Investments';

        const chart1 = new ApexCharts(document.querySelector('#chart1'), options1)
        chart1.render()

        const options2 = baseOptions;
        options2.series = @json($compareFsInvestments);
        options2.title.text = 'Previous vs. Current FS Investments';

        const chart2 = new ApexCharts(document.querySelector('#chart2'), options2)
        chart2.render()

        const options5 = baseOptions;
        options5.series = @json($compareNep);
        options5.title.text = 'Previous vs. Current NEP';

        const chart5 = new ApexCharts(document.querySelector('#chart5'), options5)
        chart5.render()

        const options6 = baseOptions;
        options6.series = @json($compareAllocation);
        options6.title.text = 'Previous vs. Current Allocation';
        const chart6 = new ApexCharts(document.querySelector('#chart6'), options6)
        chart6.render()

        const options7 = baseOptions;
        options7.series = @json($compareDisbursement);
        options7.title.text = 'Previous vs. Current Disbursement';
        const chart7 = new ApexCharts(document.querySelector('#chart7'), options7)
        chart7.render()
    </script>
@endpush
