@extends('layouts.header-only')

@section('title', 'Activities')

@section('content')
    <div class="container-lg">
        <div class="Box">
            <div class="Box-header">
                <h3 class="Box-title">Activities</h3>
            </div>
            <div class="Box-body p-0">
                @forelse($activities as $activity)
                    <div class="Box-row d-flex flex-items-start">
                        <div class="flex-auto">
                            @if(get_class($activity->subject) == 'App\\Models\\Project')
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
                @empty
                    <x-blankslate></x-blankslate>
                @endforelse
            </div>
        </div>

        <div class="d-flex flex-justify-center mt-3">
            {{ $activities->links() }}
        </div>
    </div>
@stop
