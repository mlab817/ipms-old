@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">View Audit Log</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.audit_logs.index') }}">Audit Logs</a></li>
                        <li class="breadcrumb-item active">View Audit Log</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Attribute</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $auditLog->id }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $auditLog->description }}</td>
                        </tr>
                        <tr>
                            <th>Model</th>
                            <td>{{ $auditLog->auditable_type }}</td>
                        </tr>
                        <tr>
                            <th>Model ID</th>
                            <td>{{ $auditLog->auditable_id }}</td>
                        </tr>
                        <tr>
                            <th>Original Properties</th>
                            <td style="word-break: break-all;">{{ $auditLog->original }}</td>
                        </tr>
                        <tr>
                            <th>Modified Properties</th>
                            <td style="word-break: break-all;">{{ $auditLog->modified }}</td>
                        </tr>
                        <tr>
                            <th>Host</th>
                            <td>{{ $auditLog->host }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $auditLog->created_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.audit_logs.index') }}" class="btn">Back to List</a>
            </div>
        </div>
    </section>
@endsection
