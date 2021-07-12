@extends('layouts.project')

@section('content')
    <div class="container-lg mb-6">
        <div class="Box">
            <div class="Box-header">
                <h3 class="Box-title">Review</h3>
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
            </div>
        </div>
    </div>
@stop
