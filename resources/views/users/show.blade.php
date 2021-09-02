@extends('layouts.users')

@section('content')
    <div class="Box m-3">
        <div class="Box-header">
            <h3 class="Box-title">Overview</h3>
        </div>

        <ul>
            <li class="Box-row p-0">
                <ul class="list-style-none text-center d-flex flex-wrap">
                    <li class="p-3 col-12 col-sm-6 col-md-3 border-bottom border-sm-right border-md-bottom-0 color-border-secondary">
                        <a href="#merged-pull-requests" class="d-block Link--muted">
                <span class="d-block h4 color-text-primary">
                  <svg class="octicon octicon-git-merge text-purple" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M5 3.254V3.25v.005a.75.75 0 110-.005v.004zm.45 1.9a2.25 2.25 0 10-1.95.218v5.256a2.25 2.25 0 101.5 0V7.123A5.735 5.735 0 009.25 9h1.378a2.251 2.251 0 100-1.5H9.25a4.25 4.25 0 01-3.8-2.346zM12.75 9a.75.75 0 100-1.5.75.75 0 000 1.5zm-8.5 4.5a.75.75 0 100-1.5.75.75 0 000 1.5z"></path></svg>
                  1
                </span>
                            <span class="color-text-secondary">Merged Pull Request</span>
                        </a>
                    </li>
                    <li class="p-3 col-12 col-sm-6 col-md-3 border-bottom border-md-bottom-0 border-md-right color-border-secondary">
              <span class="d-block h4">
                <svg class="octicon octicon-git-pull-request color-text-success" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.177 3.073L9.573.677A.25.25 0 0110 .854v4.792a.25.25 0 01-.427.177L7.177 3.427a.25.25 0 010-.354zM3.75 2.5a.75.75 0 100 1.5.75.75 0 000-1.5zm-2.25.75a2.25 2.25 0 113 2.122v5.256a2.251 2.251 0 11-1.5 0V5.372A2.25 2.25 0 011.5 3.25zM11 2.5h-1V4h1a1 1 0 011 1v5.628a2.251 2.251 0 101.5 0V5A2.5 2.5 0 0011 2.5zm1 10.25a.75.75 0 111.5 0 .75.75 0 01-1.5 0zM3.75 12a.75.75 0 100 1.5.75.75 0 000-1.5z"></path></svg>
                0
              </span>
                        <span class="color-text-secondary">Open Pull Requests</span>
                    </li>
                    <li class="p-3 col-12 col-sm-6 col-md-3 border-bottom border-sm-bottom-0 border-sm-right color-border-secondary">
                        <a href="#closed-issues" class="d-block Link--muted">
                <span class="d-block h4 color-text-primary">
                  <svg class="octicon octicon-issue-closed color-text-danger" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path d="M11.28 6.78a.75.75 0 00-1.06-1.06L7.25 8.69 5.78 7.22a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l3.5-3.5z"></path><path fill-rule="evenodd" d="M16 8A8 8 0 110 8a8 8 0 0116 0zm-1.5 0a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z"></path></svg>
                  3
                </span>
                            <span class="color-text-secondary">Closed Issues</span>
                        </a>
                    </li>
                    <li class="p-3 col-12 col-sm-6 col-md-3">
              <span class="d-block h4 color-text-primary">
                <svg class="octicon octicon-issue-opened color-text-success" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path><path fill-rule="evenodd" d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path></svg>
                0
              </span>
                        <span class="color-text-secondary">New Issues</span>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="" id="chart"></div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        var options = {
            series: [{
                name: 'By Updating Period',
                data: @json($chart->values())
            }],
            chart: {
                type: 'bar',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: false,
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: @json($chart->keys()),
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endpush
