@extends('layouts.header-only')

@section('content')
    <div class="color-bg-secondary border-bottom">
        <div class="container-lg d-flex flex-justify-between py-6">
            <div class="flex-auto">
                <h1 class="h1">Activities</h1>
                <p class="f4 color-text-secondary col-md-8">
                    Logged activities of the user
                </p>
            </div>
            <div class="d-flex flex-items-center">
                <div id="chart"></div>
            </div>
        </div>
    </div>

    <div class="container-lg p-responsive py-6">
        @forelse($activitiesGroupedByDay as $key => $activities)
            <div class="Box mb-6">
                <div class="Box-header">
                    <h3 class="Box-title">{{ $key }}</h3>
                </div>
                <div class="Box-body p-0">
                    @foreach($activities as $activity)
                        <div class="Box-row d-flex flex-items-start">
                            <div class="flex-auto">
                                @if($activity->subject && get_class($activity->subject) == 'App\\Models\\Project')
                                    <a href="{{ route('projects.show', $activity->subject) }}" class="btn-link">
                                        <strong>{{ ucfirst($activity->description) }}</strong>
                                    </a>
                                @else
                                    <strong>{{ ucfirst($activity->description) }}</strong>
                                @endif
                                <div class="text-small color-text-tertiary">
                                    {{ $activity->properties['ip'] ?? 'No description' }}
                                </div>
                            </div>
                            <small>{{ $activity->created_at->diffForHumans(null, null, true) }}</small>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <x-blankslate></x-blankslate>
        @endforelse
    </div>
@stop

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script type="text/javascript">
        const chartData = @json($chart);

        const chart = new ApexCharts(document.querySelector('#chart'), chartData);

        chart.render();
    </script>
@endpush
