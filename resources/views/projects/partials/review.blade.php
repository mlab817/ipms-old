<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Project for Inclusion in which Programming Document</h3>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="pip">Public Investment Program <i class="text-danger fas fa-flag"></i></label>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="pip" value="1" @if(old('pip') == 1) checked @endif>
                    Yes
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="pip" value="0" @if(old('pip') == 0) checked @endif>
                    No
                </label>
            </div>
        </div>
        <div class="form-group ml-4">
            <label>Typology <i class="text-danger fas fa-flag"></i></label>
            @foreach($pip_typologies as $option)
                <div class="form-check">
                    <input type="radio" class="form-check-input @error('pip_typology_id') text-danger @enderror" name="pip_typology_id" value="{{ $option->id }}" @if(old('pip_typology_id') == $option->id) checked @endif>
                    <label class="form-check-label @error('pip_typology_id') text-danger @enderror">{{ $option->name }}</label>
                    @error('pip_typology_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                </div>
            @endforeach
            @error('pip_typology_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="cip">Core Investment Program/Project <i class="text-danger fas fa-flag"></i></label>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="cip" value="1" @if(old('cip') == 1) checked @endif>
                    Yes
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="cip" value="0" @if(old('cip') == 0) checked @endif>
                    No
                </label>
            </div>
        </div>
        <div class="form-group ml-4">
            <label>CIP Type <i class="text-danger fas fa-flag"></i></label>
            @foreach($cip_types as $option)
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="cip_type_id" value="{{ $option->id }}">
                        {{ $option->name }}
                    </label>
                </div>
            @endforeach
            @error('cip_type_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="">Three-Year Rolling Infrastructure Program <i class="text-danger fas fa-flag"></i></label>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="trip" value="1" @if(old('trip') == 1) checked @endif>
                    Yes
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="trip" value="0" @if(old('trip') == 0) checked @endif>
                    No
                </label>
            </div>
            @error('trip')<span class="error invalid-feedback">{{ $message }}</span>@enderror
        </div>
    </div>
</div>
