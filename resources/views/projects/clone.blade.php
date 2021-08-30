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
    </div>

@endsection
