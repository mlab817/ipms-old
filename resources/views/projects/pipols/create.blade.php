@extends('layouts.project')

@section('content')
    <div class="container-md clearfix new-discussion-timeline px-3 px-md-4 px-lg-5">
        <div>
            <div class="Box">
                <div class="Box-header">
                    <h3 class="Box-title">
                        PIPOL Entry
                    </h3>
                </div>
                <div class="Box-body">
                    <form action="{{ route('projects.pipols.store', $project) }}" method="POST" accept-charset="UTF-8">
                        @csrf
                        @method('POST')
                        <dl class="form-group my-3">
                            <dt class="input-label">
                                <label for="title">PIPOL Title</label>
                            </dt>
                            <dd class="form-group-body">
                                <input type="text" class="form-control" placeholder="PIPOL Title" id="project_title" name="project_title">
                                <p class="note">The PIPOL Title should match the title of the PAP in the PIPOL System.</p>
                            </dd>
                        </dl>

                        <dl class="form-group my-3">
                            <dt class="input-label">
                                <label for="pipol_code">PIPOL Code</label>
                            </dt>
                            <dd class="form-group-body">
                                <input type="text" class="form-control" placeholder="PIPOL Code" id="pipol_code" name="pipol_code">
                                <p class="note">The PIPOL Code is the unique identifier of a PAP in the PIPOL System.</p>
                            </dd>
                        </dl>

                        <dl class="form-group my-3">
                            <dt class="input-label">
                                <label for="pipol_code">PIPOL URL</label>
                            </dt>
                            <dd class="form-group-body">
                                <input type="text" class="form-control" placeholder="PIPOL URL" id="pipol_url" name="pipol_url">
                                <p class="note">The PIPOL URL is the URL address of the PAP in the PIPOL System. Please input the entire URL.</p>
                            </dd>
                        </dl>

                        <dl class="form-group my-3">
                            <dt class="input-label">
                                <label for="pipol_code">PIPOL Status</label>
                            </dt>
                            <dd class="form-group-body">
                                <select type="text" class="form-select" id="submission_status" name="submission_status">
                                    <option value="draft" selected>Draft</option>
                                    <option value="endorsed">Endorsed</option>
                                </select>
                                <p class="note">The status of the PAP in the PIPOL System.</p>
                            </dd>
                        </dl>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
