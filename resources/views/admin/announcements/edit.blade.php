@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Announcement</strong>
            <a href="{{ route('admin.announcements.index') }}">Back to List</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.announcements.update', $announcement) }}" class="form-horizontal" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $announcement->title) }}">
                    @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror">{{ old('content', $announcement->content) }}</textarea>
                    @error('content')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="expires_at">Expires on</label>
                    <input type="date" class="form-control @error('expires_at') is-invalid @enderror" name="expires_at" id="expires_at" value="{{ old('expires_at', $announcement->expires_at) }}">
                    @error('expires_at')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success btn-sm">Submit</button>
            </form>
        </div>
    </div>
@stop

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush
