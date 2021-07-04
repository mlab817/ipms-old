<div>
    <form wire:submit.prevent="updateOffice">
        <div>
            <dl class="form-group d-inline-block my-0">
                <dt class="input-label">
                    <label for="office_id">Office</label>
                </dt>
                <dd>
                    <select class="form-select" name="office_id" wire:model="officeId">
                        <option value="">Select Office</option>
                        @foreach($offices as $option)
                            <option value="{{ $option->id }}">{{ $option->id .' - '. $option->acronym }}</option>
                        @endforeach
                    </select>

                    @if($officeId != $project->office_id)
                        <button class="btn ml-2" type="submit">Save</button>
                    @endif
                </dd>
            </dl>
        </div>
    </form>

    <div class="my-3"></div>

    <form wire:submit.prevent="updatePapType">
        <dl class="form-group d-inline-block my-0">
            <dt class="input-label">
                <label for="rename-field">Program or Project</label>
            </dt>
            <dd>
                @foreach($pap_types as $pap_type)
                    <div class="form-checkbox">
                        <label for="pap_type_{{$pap_type->id}}">
                            <input wire:model="papTypeId" class="form-checkbox-details-trigger" type="radio" id="pap_type_{{$pap_type->id}}" name="pap_type_id" value="{{ $pap_type->id }}" @if(old('pap_type_id', $project->pap_type_id) == $pap_type->id) checked @endif>
                            {{ $pap_type->name }}
                            <p class="note">
                                {{ $pap_type->description }}
                            </p>
                            @if($pap_type->id ==1)
                                <span class="form-checkbox-details text-normal d-block">
                                    <span>Regular Program</span>
                                    <select @if($papTypeId == 2) disabled @endif class="form-select" name="regular_program" id="regular_program">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </span>
                            @endif
                        </label>
                    </div>
                @endforeach

                <button class="btn ml-3" type="submit">Save</button>
            </dd>
        </dl>
    </form>
</div>
