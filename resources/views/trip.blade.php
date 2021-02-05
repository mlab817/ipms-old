<!DOCTYPE html>
<html>
<head>
    <title>TRIP</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3><strong>TRIP</strong></h3>
                </div>
            </div>

            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>Operating Unit</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Expected Outputs</th>
                    <th>Spatial Coverage</th>
                    <th>Regions</th>
                    <th>Implementation Start</th>
                    <th>Implementation End</th>
                    <th>Tier</th>
                    <th>Mode of Implementation</th>
                    <th>2022</th>
                    <th>2023</th>
                    <th>2024</th>
                    <th>Total Project Cost</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>

<script type="text/javascript">
    $(function () {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('trip.index') }}",
            columns: [
                {data: 'office', name: 'office', orderable: true, searchable: true},
                {data: 'title', name: 'title', orderable: true, searchable: true},
                {data: 'description', name: 'description', orderable: true, searchable: true},
                {data: 'expected_outputs', name: 'expected_outputs', orderable: true, searchable: true},
                {data: 'spatial_coverage', name: 'spatial_coverage', orderable: true, searchable: true},
                {data: 'regions', name: 'regions', orderable: true, searchable: true},
                {data: 'target_start_year', name: 'target_start_year', orderable: true, searchable: true},
                {data: 'target_end_year', name: 'target_end_year', orderable: true, searchable: true},
                {data: 'tier', name: 'tier', orderable: true, searchable: true},
                {data: 'implementation_mode', name: 'implementation_mode', orderable: true, searchable: true},
                {data: 'y2022', name: 'y2022', orderable: true, searchable: false},
                {data: 'y2023', name: 'y2023', orderable: true, searchable: false},
                {data: 'y2024', name: 'y2024', orderable: true, searchable: false},
                {data: 'total_project_cost', name: 'total_project_cost', orderable: true, searchable: false},
            ]
        });
    });
</script>
</html>
