@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Slug</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($items as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->slug }}</td>
                                            <td class="text-center">
                                                <div class="btn btn-group-vertical">
                                                    <a href="{{ route('admin.approval_levels.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                                    <button type="button" class="btn btn-danger" onClick="confirmDelete({{ $item->id }})">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="100%">No item to display.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-tools">
                            <div class="row justify-content-end pb-2 pr-4">
                                <a href="{{ route('admin.approval_levels.create') }}" class="btn btn-primary">Add New</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
  <script type="text/javascript">
    function confirmDelete(id) {
      let res = confirm('Are you sure you want to delete this item?')
      let url = "{{ route('admin.approval_levels.destroy', ':id') }}"
      let deleteUrl = url.replace(':id', id)

      if (res) {
        $.ajax({
          url: deleteUrl,
          type: "delete",
          data: {
            _token: "{{ csrf_token() }}",
          },
          headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
          },
          success: function (data) {
              // prompt user of success
              window.location.reload();
          },
          error: function (data) {
              console.log('Error:', data);
          }
        })
      }

    }
  </script>
@endpush
