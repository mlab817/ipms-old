<div class="card card-info">
    <div class="card-header">
        <h1 class="card-title">Review Result</h1>
        <div class="card-tools">
            @can('update', $review)
            <a href="{{ route('reviews.edit', $review) }}" class="btn btn-primary">Edit Review</a>
            @endcan
        </div>
    </div>
    <div class="card-body">
        @if($review)

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="pip" class="col-form-label col-sm-6">Public Investment Program (PIP)</label>
                        <div class="col-sm-6 text-right">
                            @if($review->pip)
                                    <span class="badge badge-success">Yes</span>
                                @else
                                    <span class="badge badge-danger">No</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pip" class="col-form-label col-sm-6">Typology</label>
                        <div class="col-sm-6 text-right">
                            {{ $review->pip_typology->name ?? '-' }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pip" class="col-form-label col-sm-6">Core Investment Program/Project (PIP)</label>
                        <div class="col-sm-6 text-right">
                            @if($review->cip)
                                <span class="badge badge-success">Yes</span>
                            @else
                                <span class="badge badge-danger">No</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pip" class="col-form-label col-sm-6">Type of CIP</label>
                        <div class="col-sm-6 text-right">
                            {{ $review->cip_type->name ?? '-' }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pip" class="col-form-label col-sm-6">Three-Year Rolling Infrastructure Program/Project (TRIP)</label>
                        <div class="col-sm-6 text-right">
                            @if($review->trip)
                                <span class="badge badge-success">Yes</span>
                            @else
                                <span class="badge badge-danger">No</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="pip" class="col-form-label col-sm-6">PIPOL Code</label>
                        <div class="col-sm-6 text-right">
                            {{ $review->pipol_code }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pip" class="col-form-label col-sm-6">PIPOL Link</label>
                        <div class="col-sm-6 text-right">
                            <a href="{{ $review->pipol_code ?? '#' }}" target="_blank">View in PIPOL</a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pip" class="col-form-label col-sm-6">PIPOL Status</label>
                        <div class="col-sm-6 text-right">
                            <div class="form-check">
                                <label for="pipol_encoded" class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="pipol_encoded" @if($review->pipol_encoded) checked @endif >
                                    PIPOL Encoded
                                </label>
                            </div>
                            <div class="form-check">
                                <label for="pipol_finalized" class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="pipol_finalized" @if($review->pipol_finalized) checked @endif >
                                    PIPOL Finalized
                                </label>
                            </div>
                            <div class="form-check">
                                <label for="pipol_endorsed" class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="pipol_endorsed" @if($review->pipol_endorsed) checked @endif >
                                    PIPOL Endorsed
                                </label>
                            </div>
                            <div class="form-check">
                                <label for="pipol_validated" class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="pipol_validated" @if($review->pipol_validated) checked @endif >
                                    PIPOL Validated
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pip" class="col-form-label col-sm-6">Comments</label>
                        <div class="col-sm-6 text-right">
                            {{ $review->comments }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pip" class="col-form-label col-sm-6">Reviewed By</label>
                        <div class="col-sm-6 text-right">
                            {{ $review->user->name ?? '' }}
                        </div>
                    </div>
                </div>
            </div>

        @else
            <span class="text-danger">The project has not been reviewed yet.</span>
        @endif
    </div>
</div>
