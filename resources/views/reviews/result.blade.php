<div class="card card-info card-outline">
    <div class="card-header">
        <h1 class="card-title">
            Review Result
        </h1>
    </div>

    <div class="card-body">
        <div class="form-group row">
            <label for="pip" class="col-form-label col-sm-3">Public Investment Program (PIP)</label>
            <div class="col-sm-9">
                @if($review->pip)
                    <span class="badge badge-success">Yes</span>
                @else
                    <span class="badge badge-danger">No</span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="pip" class="col-form-label col-sm-3">Typology</label>
            <div class="col-sm-9">
                {{ $review->pip_typology->name ?? '-' }}
            </div>
        </div>

        <div class="form-group row">
            <label for="pip" class="col-form-label col-sm-3">Core Investment Program/Project (PIP)</label>
            <div class="col-sm-9">
                @if($review->cip)
                    <span class="badge badge-success">Yes</span>
                @else
                    <span class="badge badge-danger">No</span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="pip" class="col-form-label col-sm-3">Type of CIP</label>
            <div class="col-sm-9">
                {{ $review->cip_type->name ?? '-' }}
            </div>
        </div>

        <div class="form-group row">
            <label for="pip" class="col-form-label col-sm-3">Three-Year Rolling Infrastructure Program/Project (TRIP)</label>
            <div class="col-sm-9">
                @if($review->trip)
                    <span class="badge badge-success">Yes</span>
                @else
                    <span class="badge badge-danger">No</span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="pip" class="col-form-label col-sm-3">PIPOL Code</label>
            <div class="col-sm-9">
                            <span>
                            {{ $review->pipol_code }}
                            </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="pip" class="col-form-label col-sm-3">PIPOL Link</label>
            <div class="col-sm-6">
                <a href="{{ $review->pipol_url ?? 'javascript:void(0)' }}" @if($review->pipol_url) target="_blank" @endif class="btn btn-outline-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                    </svg>
                    View in PIPOL
                </a>
            </div>
        </div>

        <div class="form-group row">
            <label for="pip" class="col-form-label col-sm-3">PIPOL Title</label>
            <div class="col-sm-9">
                {{ $review->pipol_title }}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3">PIPOL Status</label>
            <div class="column col-sm-9 pl-3">
                <div class="row">
                    <label for="pipol_encoded" class="form-check-label">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm @if($review->pipol_encoded) text-success @else text-gray @endif" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        PIPOL Encoded
                    </label>
                </div>
                <div class="row">
                    <label for="pipol_finalized" class="form-check-label">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm @if($review->pipol_finalized) text-success @else text-gray @endif" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        PIPOL Finalized
                    </label>
                </div>
                <div class="row">
                    <label for="pipol_endorsed" class="form-check-label">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm @if($review->pipol_endorsed) text-success @else text-gray @endif" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        PIPOL Endorsed
                    </label>
                </div>
                <div class="row">
                    <label for="pipol_validated" class="form-check-label">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm @if($review->pipol_validated) text-success @else text-gray @endif" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        PIPOL Validated
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="pip" class="col-form-label col-sm-3">Comments</label>
            <div class="col-sm-9">
                {{ $review->comments }}
            </div>
        </div>

        <div class="form-group row">
            <label for="user" class="col-form-label col-sm-3">Reviewed By</label>
            <div class="col-sm-9">
                <img src="{{ $review->user->avatar ?? '' }}" height="30" width="30" class="img-circle">
                {{ $review->user->name ?? '' }}
            </div>
        </div>

    </div>

    <div class="card-footer">
        <div class="row justify-content-between">
            <div>
                @can('update', $review)
                    <a href="{{ route('reviews.edit', $review) }}" class="btn btn-info mr-1">Edit Review</a>
                @endcan
                <a href="{{ route('reviews.index') }}" class="btn">
                    Back to List
                </a>
            </div>
            <div>
                @can('delete', $review)
                    <form action="{{ route('reviews.destroy', $review) }}" method="POST" id="deleteReviewForm">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('#deleteReviewForm').submit(function (evt) {
            let response = confirm('Are you sure you want to delete? This action cannot be undone.')

            if (response) {
                return true
            } else {
                evt.preventDefault()
                return false
            }
        })
    </script>
@endpush
