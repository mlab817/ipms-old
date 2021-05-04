@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h1 class="card-title">General Information</h1>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Title</label>
                                    <div class="col-sm-9">
                                        <p>
                                            {{ $project->title }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">PAP Type</label>
                                    <div class="col-sm-9">
                                        <p>
                                            {{ $project->pap_type->name ?? '' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">With Infrastructure</label>
                                    <div class="col-sm-9">
                                        <p>
                                            {{ $project->has_infra ? 'Yes' : 'No' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Description</label>
                                    <div class="col-sm-9">
                                        <p>
                                            {{ $project->description }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Expected Outputs</label>
                                    <div class="col-sm-9">
                                        <p>
                                            {{ $project->expected_outputs }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Total Project Cost</label>
                                    <div class="col-sm-9">
                                        <p>
                                            P {{ number_format($project->total_project_cost, 2) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Project Status</label>
                                    <div class="col-sm-9">
                                        <p>
                                            {{ $project->project_status->name ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        {{ $project->uuid }}
                        <div class="card-header">
                            <h1 class="card-title">Manage Permissions</h1>
                            <a href="{{ route('admin.projects.users.create', $project->uuid) }}" class="btn btn-primary btn-sm">Add</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Permissions</th>
                                    <th>Update</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn mr-2" href="{{ route('admin.projects.index') }}">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
