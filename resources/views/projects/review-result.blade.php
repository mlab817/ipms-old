<div class="card card-info">
    <div class="card-header">
        <h1 class="card-title">Review Result</h1>
    </div>
    <div class="card-body">
        @if($review)

            <div class="form-group row">
                <label for="pip" class="col-form-label col-sm-3">Public Investment Program (PIP)</label>
                <div class="col-sm-6">
                    @if($review->pip)
                            <span class="badge badge-success">Yes</span>
                        @else
                            <span class="badge badge-danger">No</span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="pip" class="col-form-label col-sm-3">Typology</label>
                <div class="col-sm-6">
                    {{ $review->pip_typology->name ?? '-' }}
                </div>
            </div>

            <div class="form-group row">
                <label for="pip" class="col-form-label col-sm-3">Core Investment Program/Project (PIP)</label>
                <div class="col-sm-6">
                    @if($review->cip)
                        <span class="badge badge-success">Yes</span>
                    @else
                        <span class="badge badge-danger">No</span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="pip" class="col-form-label col-sm-3">Type of CIP</label>
                <div class="col-sm-6">
                    {{ $review->cip_type->name ?? '-' }}
                </div>
            </div>

            <div class="form-group row">
                <label for="pip" class="col-form-label col-sm-3">Three-Year Rolling Infrastructure Program/Project (TRIP)</label>
                <div class="col-sm-6">
                    @if($review->trip)
                        <span class="badge badge-success">Yes</span>
                    @else
                        <span class="badge badge-danger">No</span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="pip" class="col-form-label col-sm-3">PIPOL Code</label>
                <div class="col-sm-6 text-right">
                    {{ $review->pipol_code }}
                </div>
            </div>
            <div class="form-group row">
                <label for="pip" class="col-form-label col-sm-3">PIPOL Link</label>
                <div class="col-sm-6">
                    <a href="{{ $review->pipol_code ?? '#' }}" target="_blank" class="btn btn-outline-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                        </svg>
                        View in PIPOL
                    </a>
                </div>
            </div>
            <div class="form-group row">
                <label for="pip" class="col-form-label col-sm-3">PIPOL Status</label>
                <div class="column pl-3">
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
                <div class="col-sm-6 text-right">
                    {{ $review->comments }}
                </div>
            </div>
            <div class="form-group row">
                <label for="pip" class="col-form-label col-sm-3">Reviewed By</label>
                <div class="col-sm-6">
                    {{ $review->user->name ?? '' }}
                </div>
            </div>

        @else
            <span class="text-danger">The project has not been reviewed yet.</span>
        @endif

    </div>
    <div class="card-footer">
        @can('update', $review)
            <a href="{{ route('reviews.edit', $review) }}" class="btn btn-info">Edit Review</a>
        @endcan
    </div>
</div>
