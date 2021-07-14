@extends('layouts.header-only')

@section('content')
    <div class="container-lg">
        ALl project notifications here grouped by projects
        @foreach($projects as $project)
            <div class="Box mt-3">
                <div class="Box-header d-flex flex-items-center p-2 pl-3">
                    <h6 class="flex-auto m-0">
                    {{ $project->title }}
                    </h6>

                    <form class="d-none d-md-block">
                        <button type="submit" title="Mark as done" class="btn btn-sm">
                            <span class="text-center d-inline-block" style="width:16px">
                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-check">
                                    <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                </svg>
                            </span>
                            Mark as done
                        </button>
                    </form>
                </div>
                <div class="Box-body p-0">
                    <ul class="list-style-none color-bg-tertiary">
                        @foreach($project->project_notifications as $notif)
                            {{ $notif->subject }}
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
@stop
