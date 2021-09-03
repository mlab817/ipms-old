@extends('layouts.header-only')

@section('title', 'Clone a Project')

@section('content')
    <div class="color-bg-secondary border-bottom">
        <div class="container-lg d-flex flex-justify-between py-6">
            <div class="flex-auto">
                <h1 class="h1">Clone a Project</h1>
                <p class="f4 color-text-secondary col-md-8">
                    Create a clone for program/project to prepare them for submission during the current updating period.
                </p>
            </div>
        </div>
    </div>

    <div class="container-lg mx-auto my-5">
        <form action="{{ route('clone_project') }}" method="POST" accept-charset="utf-8">
            @csrf
            <div class="clearfix mb-5">
                <dl class="m-0">
                    <dt>
                        <h3 class="mb-2">
                            <label class="text-normal" for="">
                                Find the program/project
                            </label>
                        </h3>
                    </dt>
                    <dd>
                        <div class="position-relative">
                            <livewire:project-clone />
                        </div>
                    </dd>
                </dl>
            </div>

            <div class="form-actions border-top pt-4">
                <button type="submit" class="btn btn-primary">Begin clone</button>
            </div>
        </form>

        <p class="mt-5 color-text-secondary">
            Recommended PAPs:
        </p>
        <ul class="pl-3">
            @foreach($recommendedProjects as $recommended)
                <li class="list-style-none mt-2">
                    <form action="{{ route('projects.clone', $recommended) }}" method="post">
                        @csrf
                        <input type="hidden" name="updating_period_id" value="{{ config('ipms.current_updating_period') }}">
                        <div class="d-flex flex-justify-between">
                        <span class="flex-auto">
                            <a href="{{ route('projects.show', $recommended) }}" class="btn-link">
                                {{ $recommended->title }}
                            </a>
                        </span>
                            <button type="submit" class="btn btn-sm">Clone</button>
                        </div>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
