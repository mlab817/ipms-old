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
                            <input wire:model="papTypeId" class="form-checkbox-details-trigger" type="radio" id="pap_type_{{$pap_type->id}}" name="pap_type_id" value="{{ $pap_type->id }}">
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

                @if($project->pap_type_id != $papTypeId)
                <button class="btn ml-3" type="submit">Save</button>
                @endif
            </dd>
        </dl>
    </form>

    <div class="my-3"></div>

    <form wire:submit.prevent="updateHasInfra">
        <dl class="form-group d-inline-block my-0">
            <dt class="input-label">
                <label for="rename-field">Does this PAP have INFRASTRUCTURE component/s?</label>
            </dt>
            <dd>
                <div class="form-checkbox ">
                    <label>
                        <input wire:model="hasInfra" class="form-checkbox-details-trigger" type="radio" id="has_infra_1" name="has_infra" value="1">
                        Yes
                        <p class="note">
                            Ticking yes will prequalify the PAP into the Three-Year Rolling Infrastructure Program (TRIP).
                            You will also need to provide infrastructure profile for the PAP to be considered for inclusion in the TRIP.
                        </p>
                    </label>
                </div>
                <div class="form-checkbox ">
                    <label>
                        <input wire:model="hasInfra" class="form-checkbox-details-trigger" type="radio" id="has_infra_0" name="has_infra" value="0">
                        No
                        <p class="note">
                            Ticking no will disqualify the PAP from the Three-Year Rolling Infrastructure Program (TRIP).
                            The infrastructure profile previously supplied will not be deleted but will no longer be viewable
                            until the yes option is ticked.
                        </p>
                    </label>
                </div>

                @if($project->has_infra != $hasInfra)
                <button class="btn ml-3" type="submit">Save</button>
                @endif
            </dd>
        </dl>
    </form>

    <div class="my-3"></div>

    <form wire:submit.prevent="updateProjectBases">
        <dl class="form-group d-inline-block my-0">
            <dt class="input-label">
                <label>Basis for Implementation</label>
            </dt>
            <dd>
                @foreach($bases as $key => $option)
                    <div class="form-checkbox">
                        <label for="basis_{{ $option->id }}">
                            <input
                                type="checkbox"
                                id="basis_{{ $option->id }}"
                                name="bases[]"
                                value="{{ $option->id }}"
                                wire:model="projectBases.{{ $key }}">
                            {{ $option->name }}
                            <p class="note">
                                {{ $option->description }}
                            </p>
                        </label>
                    </div>
                @endforeach
                <button class="btn ml-3" type="submit">Save</button>
            </dd>
        </dl>
    </form>

    <div class="my-3"></div>

    <form wire:submit.prevent="updateDescription">
        <dl class="form-group my-0">
            <dt class="input-label">
                <label for="">Description</label>
            </dt>
            <dd class="form-group-body">
                <textarea wire:model="description" class="form-control input-contrast" id="mde-description" name="description"></textarea>

                @push('scripts')
                    <script>
                        const mdeDescription = new EasyMDE({
                            element: document.getElementById('mde-description'),
                            maxHeight: '120px'
                        });
                    </script>
                @endpush

                @if($description != optional($project->description)->description)
                <div class="d-flex mt-3">
                    <span class="flex-auto"></span>
                    <button class="btn ml-3" type="submit" id="submit-description">Save</button>
                </div>
                @endif
            </dd>
        </dl>
    </form>

    <form wire:submit.prevent="updateTotalProjectCost">
        <dl class="form-group my-0">
            <dt class="input-label">
                <label for="">Total Project Cost</label>
            </dt>
            <dd class="form-group-body" x-data="{ isEditing: false, totalProjectCost: @entangle('totalProjectCost') }">
                <input x-show="!isEditing" @click="isEditing = true; $nextTick(() => $refs.totalProjectCost.focus());" type="text" class="form-control input-contrast" readonly x-bind:value="totalProjectCost.toLocaleString()">
                <input x-cloak x-show="isEditing" type="number" wire:model="totalProjectCost" class="form-control input-contrast" x-ref="totalProjectCost" name="total_project_cost">
                @if($project->total_project_cost != $totalProjectCost)
                    <button class="btn" type="submit">Save</button>
                @endif
            </dd>
        </dl>
    </form>
</div>
