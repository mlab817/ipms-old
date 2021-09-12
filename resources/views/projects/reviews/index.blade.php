@php
    $yesNo = [0 => 'No', 1 => 'Yes'];
@endphp

@extends('layouts.project')

@section('title', 'Review | ' . str_limit($project->title) )

@section('content')
    <div class="container-xl px-3 px-md-4 px-lg-5">
        <form action="{{ route('projects.reviews.store', ['project' => $project, 'review' => $review]) }}" method="POST">
            @csrf
            <div class="Box md Box--responsive">
                <div class="d-flex top-0 border-top-0 border-bottom p-2 flex-items-center flex-justify-between color-bg-primary rounded-top-2 is-stuck" style="position: sticky; z-index: 90; top: 0px !important;">
                    <div class="d-flex flex-items-center px-2">
                        <h2 class="Box-title">
                            Review
                        </h2>
                    </div>

                    <button class="float-right btn btn-primary" type="submit">Save Changes</button>
                </div>

                <div class="Box-body">

                    <dl class="form-group my-0">
                        <dt class="input-label">
                            <label for="">Public Investment Program</label>
                        </dt>
                        <dd class="form-group-body">
                            <select id="pip" name="pip" class="form-select">
                                @foreach ($yesNo as $key => $label)
                                    <option value="{{ $key }}" @if($review->pip == $key) selected @endif>{{ $key . ' - ' . $label }}</option>
                                @endforeach
                            </select>
                        </dd>
                    </dl>

                    <div class="my-3"></div>

                    <dl class="form-group my-0">
                        <dt class="input-label">
                            <label for="pip_typology_id">Typology</label>
                        </dt>
                        <dd class="form-group-body">
                            <select id="pip_typology_id" name="pip_typology_id" class="form-select">
                                <option value="">Select Typology</option>
                                @foreach ($pip_typologies as $option)
                                    <option value="{{ $option->id }}" @if($review->pip_typology_id == $option->id) selected @endif>{{ $option->id . ' - ' . $option->name }}</option>
                                @endforeach
                            </select>
                        </dd>
                    </dl>

                    <div class="my-3"></div>

                    <dl class="form-group my-0">
                        <dt class="input-label">
                            <label for="">Core Investment Program</label>
                        </dt>
                        <dd class="form-group-body">
                            <select id="cip" name="cip" class="form-select">
                                @foreach ($yesNo as $key => $label)
                                    <option value="{{ $key }}" @if($review->cip == $key) selected @endif>{{ $key . ' - ' . $label }}</option>
                                @endforeach
                            </select>
                        </dd>
                    </dl>

                    <div class="my-3"></div>

                    <dl class="form-group my-0">
                        <dt class="input-label">
                            <label for="cip_type_id">CIP Type</label>
                        </dt>
                        <dd class="form-group-body">
                            <select id="cip_type_id" name="cip_type_id" class="form-select">
                                @foreach ($cip_types as $option)
                                    <option value="{{ $option->id }}" @if($review->pip_typology_id == $option->id) selected @endif>{{ $option->id . ' - ' . $option->name }}</option>
                                @endforeach
                            </select>
                        </dd>
                    </dl>

                    <div class="my-3"></div>

                    <dl class="form-group my-0">
                        <dt class="input-label">
                            <label for="">Three-Year Rolling Infrastructure Program</label>
                        </dt>
                        <dd class="form-group-body">
                            <select id="trip" name="trip" class="form-select">
                                @foreach ($yesNo as $key => $label)
                                    <option value="{{ $key }}" @if($review->trip == $key) selected @endif>{{ $key . ' - ' . $label }}</option>
                                @endforeach
                            </select>
                        </dd>
                    </dl>

                    <div class="my-3"></div>

                    <dl class="form-group my-0">
                        <dt class="input-label">
                            <label for="">Readiness Level</label>
                        </dt>
                        <dd class="form-group-body">
                            <select id="readiness_level_id" name="readiness_level_id" class="form-select">
                                @foreach ($readiness_levels as $option)
                                    <option value="{{ $option->id }}" @if($review->readiness_level_id == $option->id) selected @endif>{{ $option->id . ' - ' . $option->name }}</option>
                                @endforeach
                            </select>
                        </dd>
                    </dl>

                    <div class="my-3"></div>

                    <dl class="form-group my-0">
                        <dt class="input-label">
                            <label for="">Comments</label>
                        </dt>
                        <dd class="form-group-body">
                            <x-md-textarea id="comments" name="comments" placeholder="Leave a comment" value="{{ $review->comments }}"></x-md-textarea>
                        </dd>
                    </dl>
                </div>
            </div>
        </form>
    </div>
@stop
