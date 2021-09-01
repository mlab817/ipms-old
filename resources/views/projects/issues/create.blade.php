@extends('layouts.project')

@section('content')
    <div class="container-xl clearfix px-3 px-md-4 px-lg-5">
        <form class="new_issue" id="new_issue" action="{{ route('projects.issues.store', $project) }}" accept-charset="UTF-8" method="post">
            @csrf
                <div class="gutter-condensed gutter-lg flex-column flex-md-row d-flex">
                    <div class="flex-shrink-0 col-12 col-md-9 mb-4 mb-md-0">
                        <div class="">
                            <span class="d-none d-md-block"></span>
                            <div class="color-bg-canvas">
                                <div class="Box">
                                    <div class="p-0 p-md-2 mb-3 mb-md-0 rounded-top-2 color-bg-canvas">
                                        <input
                                            class="form-control input-lg input-block input-contrast required title"
                                            required="required" autofocus="autofocus" autocomplete="off"
                                            placeholder="Title" type="text"
                                            name="title" id="title">
                                    </div>

                                    <div class="p-2">
                                        <x-md-textarea id="description" name="description"></x-md-textarea>
                                    </div>

                                    <div
                                        class="flex-items-center flex-justify-end mx-2 mb-2 px-0 d-none d-md-flex">
                                        <div class="d-flex flex-items-center flex-auto">
                                            <a class="tabnav-extra p-0 m-0" href="https://guides.github.com/features/mastering-markdown/" target="_blank">
                                                <svg class="octicon octicon-markdown v-align-bottom" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M14.85 3H1.15C.52 3 0 3.52 0 4.15v7.69C0 12.48.52 13 1.15 13h13.69c.64 0 1.15-.52 1.15-1.15v-7.7C16 3.52 15.48 3 14.85 3zM9 11H7V8L5.5 9.92 4 8v3H2V5h2l1.5 2L7 5h2v6zm2.99.5L9.5 8H11V5h2v3h1.5l-2.51 3.5z"></path></svg>
                                                Styling with Markdown is supported
                                            </a>
                                        </div>
                                        <button type="submit" class="btn-primary btn">
                                            Submit new issue
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
@stop
