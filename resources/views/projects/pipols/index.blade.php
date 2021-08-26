@extends('layouts.project')

@section('content')
    <div class="container-md clearfix px-3 px-md-4 px-lg-5">
        <div>
            <div class="Box">
                <div class="Box-header color-bg-canvas">
                    <h3 class="Box-title">
                        PIPOL Entry
                    </h3>
                </div>
                <div class="Box-body">
                    @if (! $project->pipol)
                        <div class="blankslate">
                            <img src="https://ghicons.github.com/assets/images/blue/png/Pull%20request.png" alt="" class="mb-3" />
                            <h3 class="mb-1">This PAP doesn’t seem to have a PIPOL Entry yet.</h3>
                            <p>
                                The Public Investment Program Online (PIPOL) System is the official
                                data entry system for inclusion of PAPs in the updated PIP. Create
                                an entry for this PAP to ensure its inclusion.
                            </p>
                            <a class="btn btn-primary my-3" href="{{ route('projects.pipols.create', $project) }}" role="button">New</a>
                        </div>
                    @else
                        <form action="{{ route('projects.pipols.update', ['project' => $project, 'pipol' => $project->pipol]) }}" method="POST" accept-charset="UTF-8">
                            @csrf
                            @method('PUT')
                            <dl class="form-group my-3">
                                <dt class="input-label">
                                    <label for="pipol_code">PIPOL Title</label>
                                </dt>
                                <dd class="form-group-body">
                                    <input type="text" class="form-control" placeholder="PIPOL Title" id="project_title" name="project_title" value="{{ $project->pipol->project_title }}">

                                    <p class="note">The PIPOL Title should match the title of the PAP in the PIPOL System.</p>
                                </dd>
                            </dl>

                            <dl class="form-group my-3">
                                <dt class="input-label">
                                    <label for="pipol_code">PIPOL Code</label>
                                </dt>
                                <dd class="form-group-body">
                                    <input type="text" class="form-control" placeholder="PIPOL Code" id="pipol_code" name="pipol_code" value="{{ $project->pipol->pipol_code }}">
                                    <p class="note">The PIPOL Code is the unique identifier of a PAP in the PIPOL System.</p>
                                </dd>
                            </dl>

                            <dl class="form-group my-3">
                                <dt class="input-label">
                                    <label for="pipol_url">PIPOL URL</label>
                                </dt>
                                <dd class="form-group-body">
                                    <input type="text" class="form-control" placeholder="PIPOL URL" id="pipol_url" name="pipol_url" value="{{ $project->pipol->pipol_url }}">
                                    <p class="note">The URL of the PAP in the PIPOL System</p>
                                </dd>
                            </dl>

                            <dl class="form-group my-3">
                                <dt class="input-label">
                                    <label for="pipol_code">PIPOL Status</label>
                                </dt>
                                <dd class="form-group-body">
                                    <select type="text" class="form-select" id="submission_status" name="submission_status">
                                        @foreach(\App\Models\Pipol::SUBMISSION_STATUS as $key => $label)
                                            <option value="{{ $key }}">{{ $label }}</option>
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
                                        @foreach(\App\Models\Reason::all() as $reason)
                                            <option value="{{ $reason->id }}">{{ $reason->name }}</option>
                                        @endforeach
                                    </select>
                                </dd>
                            </dl>

                            <dl class="form-group my-3">
                                <dt class="input-label">
                                    <label for="pipol_url">Specify reason for dropping: </label>
                                </dt>
                                <dd class="form-group-body">
                                    <textarea name="other_reason" id="other_reason" class="form-control" style="resize: none;">{{ $project->pipol->other_reason }}</textarea>
                                    <p class="note">If reason for dropping is others, please specify</p>
                                </dd>
                            </dl>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <div class="my-3"></div>
@stop
