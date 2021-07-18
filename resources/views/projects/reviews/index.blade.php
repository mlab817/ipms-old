@extends('layouts.project')

@section('title', 'Review | ' . str_limit($project->title) )

@section('content')
    <div class="container-lg mb-6">
        <div class="Box">
            <div class="Box-header">
                <h3 class="Box-title">Review</h3>
            </div>
            <div class="Box-body">
                @if(!$review)
                <div class="blankslate blankslate-large">
                    <img src="https://ghicons.github.com/assets/images/blue/png/Pull%20request.png" alt="" class="mb-3" />
                    <h3 class="mb-1">This program/project has not been reviewed.</h3>
                    <a class="btn btn-primary my-3" role="button" href="{{ route('projects.reviews.create', $project) }}">New review</a>
                </div>
                @else

                <form action="{{ route('projects.reviews.update', ['project' => $project, 'review' => $review]) }}" method="POST">
                    @csrf
                    @method('PUT')
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
                            <label for="">Typology</label>
                        </dt>
                        <dd class="form-group-body">
                            <select id="pip_typology_id" name="pip_typology_id" class="form-select">
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
                            <label for="">CIP Type</label>
                        </dt>
                        <dd class="form-group-body">
                            <select id="pip_typology_id" name="pip_typology_id" class="form-select">
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

                    <div class="form-actions pr-2 pt-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
@stop
