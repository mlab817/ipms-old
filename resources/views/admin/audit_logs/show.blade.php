@extends('layouts.admin')

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
                            <th>Properties</th>
                            <td style="word-break: break-all;">{{ $auditLog->properties }}</td>
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
