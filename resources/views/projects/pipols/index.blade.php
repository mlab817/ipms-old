@extends('layouts.project')

@section('title', 'PIPOL | ' . str_limit($project->title) )

@section('content')
    <div class="container-xl clearfix px-3 px-md-4 px-lg-5">
        <form action="{{ route('projects.pipols.update', ['project' => $project, 'pipol' => $pipol]) }}" method="POST" accept-charset="UTF-8">
            @csrf
            @method('PUT')
            <div class="Box md Box--responsive">
                <div class="d-flex top-0 border-top-0 border-bottom p-2 flex-items-center flex-justify-between color-bg-primary rounded-top-2 is-stuck" style="position: sticky; z-index: 90; top: 0px !important;">
                    <div class="d-flex flex-items-center px-2">
                        <h2 class="Box-title">
                            PIPOL Entry
                        </h2>
                    </div>

                    <button class="float-right btn btn-primary" type="submit">Save Changes</button>
                </div>

                <div class="Box-body">
                    <dl class="form-group my-3">
                        <dt class="input-label">
                            <label for="pipol_code">PIPOL Title</label>
                        </dt>
                        <dd class="form-group-body">
                            <input type="text" class="form-control input-block" placeholder="PIPOL Title" id="project_title" name="project_title" value="{{ old('project_title', $pipol->project_title) }}">

                            <p class="note">The PIPOL Title should match the title of the PAP in the PIPOL System.</p>
                        </dd>
                    </dl>

                    <dl class="form-group my-3">
                        <dt class="input-label">
                            <label for="pipol_code">PIPOL Code</label>
                        </dt>
                        <dd class="form-group-body">
                            <input type="text" class="form-control" placeholder="PIPOL Code" id="pipol_code" name="pipol_code" value="{{ old('pipol_code', $pipol->pipol_code) }}">
                            <p class="note">The PIPOL Code is the unique identifier of a PAP in the PIPOL System.</p>
                        </dd>
                    </dl>

                    <dl class="form-group my-3">
                        <dt class="input-label">
                            <label for="pipol_url">PIPOL URL</label>
                        </dt>
                        <dd class="form-group-body">
                            <input type="text" class="form-control" placeholder="PIPOL URL" id="pipol_url" name="pipol_url" value="{{ old('pipol_url', $pipol->pipol_url) }}">
                            <p class="note">The URL of the PAP in the PIPOL System</p>
                        </dd>
                    </dl>

                    <dl class="form-group my-3">
                        <dt class="input-label">
                            <label for="pipol_code">PIPOL Status</label>
                        </dt>
                        <dd class="form-group-body">
                            <select type="text" class="form-select" id="submission_status" name="submission_status">
                                @foreach($submissionStatus as $key => $label)
                                    <option value="{{ $key }}" @if($pipol->submission_status == $key) selected @endif>{{ $label }}</option>
                                @endforeach
                            </select>

                            <p class="note">The status of the PAP in the PIPOL System.</p>
                        </dd>
                    </dl>

                    <dl class="form-group my-3">
                        <dt class="input-label">
                            <label for="pipol_url">Select reason for dropping PAP: </label>
                        </dt>
                        <dd class="form-group-body">
                            <select x-model="reason_id" type="text" class="form-select" id="reason_id" name="reason_id">
                                <option value="">Not Applicable</option>
                                @foreach($reasons as $reason)
                                    <option value="{{ $reason->id }}" @if($pipol->reason_id == $reason->id) selected @endif>{{ $reason->name }}</option>
                                @endforeach
                            </select>
                        </dd>
                    </dl>

                    <dl class="form-group my-3">
                        <dt class="input-label">
                            <label for="pipol_url">Specify reason for dropping: </label>
                        </dt>
                        <dd class="form-group-body">
                            <textarea name="other_reason" id="other_reason" class="form-control" style="resize: none;">{{ $pipol->other_reason }}</textarea>
                            <p class="note">If reason for dropping is others, please specify</p>
                        </dd>
                    </dl>

                </div>
            </div>
        </form>
    </div>

    <div class="my-3"></div>
@stop
