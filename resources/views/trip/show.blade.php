@extends('layouts.project')

@php
    $booleanOptions = [
        1 => 'Yes',
        0 => 'No',
    ];
@endphp

@section('content')
    @if($errors->any())
        <div class="flash mb-3 flash-error">
            <p>
                Please check the following errors.
            </p>
            <ul class="mx-4">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('trips.update', ['project' => $project->uuid]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="Box md Box--responsive">
            <div class="d-flex top-0 border-top-0 border-bottom p-2 flex-items-center flex-justify-between color-bg-primary rounded-top-2 is-stuck" style="position: sticky; z-index: 90; top: 0px !important;">
                <div class="d-flex flex-items-center">
                    <details class="dropdown details-reset details-overlay">
                        <summary class="btn btn-octicon m-0 mr-2 p-2" aria-haspopup="true" role="button">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"  height="16" width="16" class="octicon octicon-list-unordered">
                                <path fill-rule="evenodd" d="M2 4a1 1 0 100-2 1 1 0 000 2zm3.75-1.5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zM3 8a1 1 0 11-2 0 1 1 0 012 0zm-1 6a1 1 0 100-2 1 1 0 000 2z"></path>
                            </svg>
                        </summary>

                        <ul class="dropdown-menu dropdown-menu-e">
                            <li><a class="dropdown-item" href="#infrastructure-sector">Infrastructure Sector</a></li>
                            <li><a class="dropdown-item" href="#prerequisites">Prerequisites</a></li>
                            <li><a class="dropdown-item" href="#preinvestment-requirement">Pre-Investment Requirement</a></li>
                            <li><a href="#infrastructure-investment-required-by-funding-source" class="dropdown-item">Infrastructure Investment Required by Funding Source</a></li>
                            <li><a href="#infrastructure-investment-required-by-region" class="dropdown-item">Infrastructure Investment Required by Region</a></li>
                        </ul>
                    </details>

                    <h2 class="Box-title">
                        {{ $project->title }}
                    </h2>
                </div>

                <button class="float-right btn btn-primary" type="submit">Save Changes</button>
            </div>
            <!--// Navigator -->
            <div class="Box-body">

                <div class="Subhead Subhead--spacious">
                    <div id="infrastructure-sector" class="Subhead-heading">{{ __("Infrastructure Sector") }}</div>
                </div>

                <div id="infrastructure_sectors">
                    <dl class="form-group my-0">
                        <dt class="input-label">
                            <label for="infrastructure_sectors">Infrastructure Sector</label>
                        </dt>
                        <dd>
                            @foreach($infrastructure_sectors as $option)
                                <div class="form-checkbox">
                                    <label
                                        class="@error('infrastructure_sectors') text-danger @enderror"
                                        for="infrastructure_sector_{{ $option->id }}">
                                        <input
                                            id="infrastructure_sector_{{ $option->id }}"
                                            type="checkbox"
                                            value="{{ $option->id }}"
                                            name="infrastructure_sectors[]"
                                            @if(in_array($option->id, old('infrastructure_sectors', $project->infrastructure_sectors->pluck('id')->toArray() ?? []))) checked @endif>
                                        {{ $option->name }}
                                    </label>
                                </div>
                                @foreach($option->children as $child)
                                    <div class="ml-4 form-checkbox">
                                        <label for="infrastructure_subsector_{{ $child->id }}">
                                            <input type="checkbox"
                                                   id="infrastructure_subsector_{{ $child->id }}"
                                                   value="{{ $child->id }}" name="infrastructure_subsectors[]"
                                                   @if(in_array($child->id, old('infrastructure_subsectors', $project->infrastructure_subsectors->pluck('id')->toArray() ?? []))) checked @endif>
                                            {{ $child->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @endforeach
                            @error('infrastructure_sectors')<span
                                class="error invalid-feedback">{{ $message }}</span>@enderror
                            @error('infrastructure_subsectors')<span
                                class="error invalid-feedback">{{ $message }}</span>@enderror
                        </dd>
                    </dl>

                </div>

                <div class="my-3"></div>

                <dl class="form-group my-0">
                    <dt class="input-label">
                        <label for="infrastructure_sectors">Other Infrastructure</label>
                    </dt>
                    <dd>
                        <input type="text"
                               class="form-control @error('other_infrastructure') is-invalid @enderror"
                               name="other_infrastructure"
                               id="other_infrastructure"
                               placeholder="Other infrastructure"
                               value="{{ old('other_infrastructure', $project->other_infrastructure) }}">
                        @error('other_infrastructure')<span
                            class="error invalid-feedback">{{ $message }}</span>@enderror
                    </dd>
                </dl>

                <div class="my-3"></div>

                <div class="Subhead Subhead--spacious">
                    <div id="prerequisites" class="Subhead-heading">{{ __("Prerequisites") }}</div>
                </div>

                <dl class="form-group my-0">
                    <dt class="input-label">
                        <label for="prerequisites">Prerequisites</label>
                    </dt>
                    <dd>
                        @foreach($prerequisites as $option)
                            <div class="form-checkbox">
                                <label>
                                    <input type="checkbox" name="prerequisites[]" id="prerequisites_{{$option->id}}" value="{{ $option->id }}" @if(in_array($option->id, old('prerequisities') ?? [])) checked @endif>
                                    {{ $option->name }}
                                </label>
                            </div>
                        @endforeach
                        @error('prerequisites')<span
                            class="error invalid-feedback">{{ $message }}</span>@enderror
                    </dd>
                </dl>

                <div class="my-3"></div>

                <dl class="form-group my-0">
                    <dt class="input-label">
                        <label for="risk">Implementation Risk &amp; Mitigation Strategy </label>
                    </dt>
                    <dd class="form-group-body">
                            <textarea class="form-control input-contrast @error('risk') is-invalid @enderror" name="risk"
                                      placeholder="Implementation Risk and Mitigation Strategy">{{ old('risk', $project->risk->risk ?? '') }}</textarea>
                        @error('risk')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                    </dd>
                </dl>

                <div class="my-3"></div>

                <div class="Subhead Subhead--spacious">
                    <div id="preinvestment-requirement" class="Subhead-heading">{{ __("Pre-Investment Requirement") }}</div>
                </div>

                <dl class="form-group my-0">
                    <dt class="input-label">
                        <label for="has_row">Does the project have a Right of Way Acquisition (ROWA) component?</label>
                    </dt>
                    <dd>
                        <select name="has_row" id="has_row" class="form-select">
                            @foreach ($booleanOptions as $key => $label)
                                <option value="{{ $key }}" @if(old('has_row') == $key) selected @endif>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('has_row')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                    </dd>
                </dl>

                <div class="my-3"></div>

                <dl class="form-group my-0">
                    <dt class="input-label">
                        <label for="rowa">Schedule of Right of Way Acquisition (ROWA) Cost</label>
                    </dt>
                    <dd class="form-group-body">
                        <div class="d-table col-12">
                            <div class="d-table-cell text-center col-2 p-1">
                                2017
                                <input type="number" class="form-control text-right width-full input-contrast" id="right_of_way.y2017" name="right_of_way[y2017]" value="{{ old('right_of_way.y2017', $project->right_of_way->y2017 ?? 0) }}">
                            </div>
                            <div class="d-table-cell text-center col-2 p-1">
                                2018
                                <input type="number" class="form-control text-right width-full input-contrast" id="right_of_way.y2018" name="right_of_way[y2018]" value="{{ old('right_of_way.y2018', $project->right_of_way->y2018 ?? 0) }}">
                            </div>
                            <div class="d-table-cell text-center col-2 p-1">
                                2019
                                <input type="number" class="form-control text-right width-full input-contrast" id="right_of_way.y2019" name="right_of_way[y2019]" value="{{ old('right_of_way.y2019', $project->right_of_way->y2019 ?? 0) }}">
                            </div>
                            <div class="d-table-cell text-center col-2 p-1">
                                2020
                                <input type="number" class="form-control text-right width-full input-contrast" id="right_of_way.y2020" name="right_of_way[y2020]" value="{{ old('right_of_way.y2020', $project->right_of_way->y2020 ?? 0) }}">
                            </div>
                            <div class="d-table-cell text-center col-2 p-1">
                                2021
                                <input type="number" class="form-control text-right width-full input-contrast" id="right_of_way.y2021" name="right_of_way[y2021]" value="{{ old('right_of_way.y2021', $project->right_of_way->y2021 ?? 0) }}">
                            </div>
                            <div class="d-table-cell text-center col-2 p-1">
                                2022
                                <input type="number" class="form-control text-right width-full input-contrast" id="right_of_way.y2022" name="right_of_way[y2022]" value="{{ old('right_of_way.y2022', $project->right_of_way->y2022 ?? 0) }}">
                            </div>
                        </div>
                    </dd>
                </dl>

                <div class="my-3"></div>

                <dl class="form-group my-0">
                    <dt class="input-label">
                        <label for="">Affected Households (no.)</label>
                    </dt>
                    <dd class="form-group">
                        <input type="number" class="form-control" name="right_of_way[affected_households]" value="{{ old('right_of_way.affected_households', 0) }}">
                    </dd>
                </dl>

                <div class="my-3"></div>

                <div class="border-bottom"></div>

                <div class="my-3"></div>

                <dl class="form-group my-0">
                    <dt class="input-label">
                        <label for="has_rap">Does the project have a Resettlement Action Plan (RAP) component?</label>
                    </dt>
                    <dd>
                        <select name="has_rap" id="has_rap" class="form-select">
                            @foreach ($booleanOptions as $key => $label)
                                <option value="{{ $key }}" @if(old('has_rap') == $key) selected @endif>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('has_row')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                    </dd>
                </dl>

                <div class="my-3"></div>

                <dl class="form-group my-0">
                    <dt class="input-label">
                        <label for="rowa">Schedule of Resettlement Action Plan (RAP) Cost</label>
                    </dt>
                    <dd class="form-group-body">
                        <div class="d-table col-12">
                            <div class="d-table-cell text-center col-2 p-1">
                                2017
                                <input type="number" class="form-control text-right width-full input-contrast" id="resettlement_action_plan.y2017" name="resettlement_action_plan[y2017]" value="{{ old('resettlement_action_plan.y2017', $project->resettlement_action_plan->y2017 ?? 0) }}">
                            </div>
                            <div class="d-table-cell text-center col-2 p-1">
                                2018
                                <input type="number" class="form-control text-right width-full input-contrast" id="resettlement_action_plan.y2018" name="resettlement_action_plan[y2018]" value="{{ old('resettlement_action_plan.y2018', $project->resettlement_action_plan->y2018 ?? 0) }}">
                            </div>
                            <div class="d-table-cell text-center col-2 p-1">
                                2019
                                <input type="number" class="form-control text-right width-full input-contrast" id="resettlement_action_plan.y2019" name="resettlement_action_plan[y2019]" value="{{ old('resettlement_action_plan.y2019', $project->resettlement_action_plan->y2019 ?? 0) }}">
                            </div>
                            <div class="d-table-cell text-center col-2 p-1">
                                2020
                                <input type="number" class="form-control text-right width-full input-contrast" id="resettlement_action_plan.y2020" name="resettlement_action_plan[y2020]" value="{{ old('resettlement_action_plan.y2020', $project->resettlement_action_plan->y2020 ?? 0) }}">
                            </div>
                            <div class="d-table-cell text-center col-2 p-1">
                                2021
                                <input type="number" class="form-control text-right width-full input-contrast" id="resettlement_action_plan.y2021" name="resettlement_action_plan[y2021]" value="{{ old('resettlement_action_plan.y2021', $project->resettlement_action_plan->y2021 ?? 0) }}">
                            </div>
                            <div class="d-table-cell text-center col-2 p-1">
                                2022
                                <input type="number" class="form-control text-right width-full input-contrast" id="resettlement_action_plan.y2022" name="resettlement_action_plan[y2022]" value="{{ old('resettlement_action_plan.y2022', $project->resettlement_action_plan->y2022 ?? 0) }}">
                            </div>
                        </div>
                    </dd>
                </dl>

                <div class="my-3"></div>

                <dl class="form-group my-0">
                    <dt class="input-label">
                        <label for="">Affected Households (no.)</label>
                    </dt>
                    <dd class="form-group">
                        <input type="number" class="form-control" name="resettlement_action_plan[affected_households]" value="{{ old('resettlement_action_plan.affected_households', 0) }}">
                    </dd>
                </dl>

                <div class="my-3"></div>

                <div class="Subhead Subhead--spacious">
                    <div class="Subhead-heading" id="infrastructure-investment-required-by-funding-source">{{ __("Infrastructure Investment Required by Funding Source") }}</div>
                    <div class="Subhead-description">in absolute PhP terms</div>
                </div>

                <dl class="my-0">
                    <dt class="input-label">

                    </dt>
                    <dd class="form-group-body">
                        <script>
                            document.addEventListener('alpine:init', () => {
                                Alpine.data('fsInfrastructures', () => ({
                                    items: @json($project->fs_infrastructures),
                                    get total() {
                                        const items = this.items,
                                            totalsRow = {
                                                y2016: 0,
                                                y2017: 0,
                                                y2018: 0,
                                                y2019: 0,
                                                y2020: 0,
                                                y2021: 0,
                                                y2022: 0,
                                                y2023: 0,
                                                total: 0
                                            }

                                        items.length && items.reduce((acc, item) => {
                                            acc.y2016 += parseFloat(item.y2016)
                                            acc.y2017 += parseFloat(item.y2017)
                                            acc.y2018 += parseFloat(item.y2018)
                                            acc.y2019 += parseFloat(item.y2019)
                                            acc.y2020 += parseFloat(item.y2020)
                                            acc.y2021 += parseFloat(item.y2021)
                                            acc.y2022 += parseFloat(item.y2022)
                                            acc.y2023 += parseFloat(item.y2023)
                                            acc.total += parseFloat(item.y2016)
                                                + parseFloat(item.y2017)
                                                + parseFloat(item.y2018)
                                                + parseFloat(item.y2019)
                                                + parseFloat(item.y2020)
                                                + parseFloat(item.y2021)
                                                + parseFloat(item.y2022)
                                                + parseFloat(item.y2023)
                                            return acc
                                        }, totalsRow)

                                        return totalsRow
                                    },
                                    format(val) {
                                        return val.toLocaleString()
                                    }
                                }));
                            });
                        </script>
                        <div x-data="fsInfrastructures">
                            <div class="d-table col-12 border-bottom border-top">
                                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                                    Funding Source
                                </div>
                                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                                    2016 &amp; Prior
                                </div>
                                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                                    2017
                                </div>
                                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                                    2018
                                </div>
                                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                                    2019
                                </div>
                                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                                    2020
                                </div>
                                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                                    2021
                                </div>
                                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                                    2022
                                </div>
                                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                                    2023 &amp; Beyond
                                </div>
                                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                                    Total
                                </div>
                            </div>

                            <template x-for="(item, index) in items" :key="index">
                                <div class="d-table col-12 border-bottom" x-data="{
                                    item: item,
                                    get total() {
                                        const { y2016,
                                            y2017,
                                            y2018,
                                            y2019,
                                            y2020,
                                            y2021,
                                            y2022,
                                            y2023 } = item
                                        const total = parseFloat(y2016)
                                            + parseFloat(y2017)
                                            + parseFloat(y2018)
                                            + parseFloat(y2019)
                                            + parseFloat(y2020)
                                            + parseFloat(y2021)
                                            + parseFloat(y2022)
                                            + parseFloat(y2023)
                                        return total.toLocaleString()
                                    }
                                }">
                                    <div class="col-1 p-1 d-table-cell">
                                        <input type="hidden" x-bind:name="`fs_infrastructures[${index}][fs_id]`" x-model="item.fs_id">
                                        <span x-text="item.funding_source.name"></span>
                                    </div>
                                    <div class="col-1 p-1 d-table-cell">
                                        <input type="number" class="form-control text-right width-full border-0" x-bind:name="`fs_infrastructures[${index}][y2016]`" x-model="item.y2016">
                                    </div>
                                    <div class="col-1 p-1 d-table-cell">
                                        <input type="number" class="form-control text-right width-full border-0" x-bind:name="`fs_infrastructures[${index}][y2017]`" x-model="item.y2017">
                                    </div>
                                    <div class="col-1 p-1 d-table-cell">
                                        <input type="number" class="form-control text-right width-full border-0" x-bind:name="`fs_infrastructures[${index}][y2018]`" x-model="item.y2018">
                                    </div>
                                    <div class="col-1 p-1 d-table-cell">
                                        <input type="number" class="form-control text-right width-full border-0" x-bind:name="`fs_infrastructures[${index}][y2019]`" x-model="item.y2019">
                                    </div>
                                    <div class="col-1 p-1 d-table-cell">
                                        <input type="number" class="form-control text-right width-full border-0" x-bind:name="`fs_infrastructures[${index}][y2020]`" x-model="item.y2020">
                                    </div>
                                    <div class="col-1 p-1 d-table-cell">
                                        <input type="number" class="form-control text-right width-full border-0" x-bind:name="`fs_infrastructures[${index}][y2021]`" x-model="item.y2021">
                                    </div>
                                    <div class="col-1 p-1 d-table-cell">
                                        <input type="number" class="form-control text-right width-full border-0" x-bind:name="`fs_infrastructures[${index}][y2022]`" x-model="item.y2022">
                                    </div>
                                    <div class="col-1 p-1 d-table-cell">
                                        <input type="number" class="form-control text-right width-full border-0" x-bind:name="`fs_infrastructures[${index}][y2023]`" x-model="item.y2023">
                                    </div>
                                    <div class="col-1 p-1 d-table-cell">
                                        <div class="text-right" x-text="total"></div>
                                    </div>
                                </div>
                            </template>

                            <div class="d-table col-12 border-bottom border-top">
                                <div class="d-table col-12 border-bottom border-top">
                                    <div class="col-1 p-2 v-align-middle d-table-cell">
                                        Total
                                    </div>
                                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">
                                        <div class="text-right" x-text="format(total.y2016)"></div>
                                    </div>
                                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">
                                        <div class="text-right" x-text="format(total.y2017)"></div>
                                    </div>
                                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">
                                        <div class="text-right" x-text="format(total.y2018)"></div>
                                    </div>
                                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">
                                        <div class="text-right" x-text="format(total.y2019)"></div>
                                    </div>
                                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">
                                        <div class="text-right" x-text="format(total.y2020)"></div>
                                    </div>
                                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">
                                        <div class="text-right" x-text="format(total.y2021)"></div>
                                    </div>
                                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">
                                        <div class="text-right" x-text="format(total.y2022)"></div>
                                    </div>
                                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">
                                        <div class="text-right" x-text="format(total.y2023)"></div>
                                    </div>
                                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">
                                        <div class="text-right" x-text="format(total.total)"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </dd>
                </dl>

                <div class="my-3"></div>

                <div class="Subhead Subhead--spacious">
                    <div class="Subhead-heading" id="infrastructure-investment-required-by-region">{{ __("Infrastructure Investment Required by Region") }}</div>
                    <div class="Subhead-description">in absolute PhP terms</div>
                </div>

                <dl class="my-0">
                    <dt class="input-label">

                    </dt>
                    <dd class="form-group-body" >
                        <script>
                            document.addEventListener('alpine:init', () => {
                                Alpine.data('regionInfrastructures', () => ({
                                    items: @json($project->region_infrastructures->sortBy('region.order')),
                                    get total() {
                                        const regionInfrastructures = this.items,
                                            totalsRow = {
                                                y2016: 0,
                                                y2017: 0,
                                                y2018: 0,
                                                y2019: 0,
                                                y2020: 0,
                                                y2021: 0,
                                                y2022: 0,
                                                y2023: 0,
                                                total: 0
                                            }

                                        regionInfrastructures.length && regionInfrastructures.reduce((acc, item) => {
                                            acc.y2016 += parseFloat(item.y2016)
                                            acc.y2017 += parseFloat(item.y2017)
                                            acc.y2018 += parseFloat(item.y2018)
                                            acc.y2019 += parseFloat(item.y2019)
                                            acc.y2020 += parseFloat(item.y2020)
                                            acc.y2021 += parseFloat(item.y2021)
                                            acc.y2022 += parseFloat(item.y2022)
                                            acc.y2023 += parseFloat(item.y2023)
                                            acc.total += parseFloat(item.y2016)
                                                + parseFloat(item.y2017)
                                                + parseFloat(item.y2018)
                                                + parseFloat(item.y2019)
                                                + parseFloat(item.y2020)
                                                + parseFloat(item.y2021)
                                                + parseFloat(item.y2022)
                                                + parseFloat(item.y2023)
                                            return acc
                                        }, totalsRow)

                                        return totalsRow
                                    },
                                    format(val) {
                                        return val.toLocaleString()
                                    }
                                }))
                            })
                        </script>
                        <div x-data="regionInfrastructures">
                            <div class="d-table col-12 border-bottom border-top">
                                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                                    Region
                                </div>
                                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                                    2016 &amp; Prior
                                </div>
                                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                                    2017
                                </div>
                                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                                    2018
                                </div>
                                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                                    2019
                                </div>
                                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                                    2020
                                </div>
                                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                                    2021
                                </div>
                                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                                    2022
                                </div>
                                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                                    2023 &amp; Beyond
                                </div>
                                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                                    Total
                                </div>
                            </div>

                            <template x-for="(item, index) in items" :key="index">
                                <div class="d-table col-12 border-bottom">
                                    <div class="col-1 p-1 d-table-cell">
                                        <input type="hidden" x-bind:name="`region_infrastructures[${index}][region_id]`" x-model="item.region_id">
                                        <div x-text="item.region.label"></div>
                                    </div>
                                    <div class="col-1 p-1 d-table-cell">
                                        <input type="number" class="form-control text-right border-0 width-full"  x-bind:name="`region_infrastructures[${index}][y2016]`" x-model="item.y2016">
                                    </div>
                                    <div class="col-1 p-1 d-table-cell">
                                        <input type="number" class="form-control text-right border-0 width-full"  x-bind:name="`region_infrastructures[${index}][y2017]`" x-model="item.y2017">
                                    </div>
                                    <div class="col-1 p-1 d-table-cell">
                                        <input type="number" class="form-control text-right border-0 width-full"  x-bind:name="`region_infrastructures[${index}][y2018]`" x-model="item.y2018">
                                    </div>
                                    <div class="col-1 p-1 d-table-cell">
                                        <input type="number" class="form-control text-right border-0 width-full"  x-bind:name="`region_infrastructures[${index}][y2019]`" x-model="item.y2019">
                                    </div>
                                    <div class="col-1 p-1 d-table-cell">
                                        <input type="number" class="form-control text-right border-0 width-full"  x-bind:name="`region_infrastructures[${index}][y2020]`" x-model="item.y2020">
                                    </div>
                                    <div class="col-1 p-1 d-table-cell">
                                        <input type="number" class="form-control text-right border-0 width-full"  x-bind:name="`region_infrastructures[${index}][y2020]`" x-model="item.y2020">
                                    </div>
                                    <div class="col-1 p-1 d-table-cell">
                                        <input type="number" class="form-control text-right border-0 width-full"  x-bind:name="`region_infrastructures[${index}][y2021]`" x-model="item.y2021">
                                    </div>
                                    <div class="col-1 p-1 d-table-cell">
                                        <input type="number" class="form-control text-right border-0 width-full"  x-bind:name="`region_infrastructures[${index}][y2022]`" x-model="item.y2022">
                                    </div>
                                    <div class="col-1 p-1 d-table-cell">
                                        <input type="number" class="form-control text-right border-0 width-full"  x-bind:name="`region_infrastructures[${index}][y2023]`" x-model="item.y2023">
                                    </div>
                                    <div class="col-1 p-1 d-table-cell text-right">
                                        <span x-text="format(parseFloat(item.y2016) + parseFloat(item.y2017) + parseFloat(item.y2018) + parseFloat(item.y2019) + parseFloat(item.y2020) + parseFloat(item.y2021) + parseFloat(item.y2016) + parseFloat(item.y2022) + parseFloat(item.y2023))"></span>
                                    </div>
                                </div>
                            </template>

                            <div class="d-table col-12 border-bottom border-top">
                                <div class="col-1 p-2 v-align-middle d-table-cell">
                                    Total
                                </div>
                                <div class="col-1 p-2 text-right v-align-middle d-table-cell">
                                    <div class="text-right" x-text="format(total.y2016)"></div>
                                </div>
                                <div class="col-1 p-2 text-right v-align-middle d-table-cell">
                                    <div class="text-right" x-text="format(total.y2017)"></div>
                                </div>
                                <div class="col-1 p-2 text-right v-align-middle d-table-cell">
                                    <div class="text-right" x-text="format(total.y2018)"></div>
                                </div>
                                <div class="col-1 p-2 text-right v-align-middle d-table-cell">
                                    <div class="text-right" x-text="format(total.y2019)"></div>
                                </div>
                                <div class="col-1 p-2 text-right v-align-middle d-table-cell">
                                    <div class="text-right" x-text="format(total.y2020)"></div>
                                </div>
                                <div class="col-1 p-2 text-right v-align-middle d-table-cell">
                                    <div class="text-right" x-text="format(total.y2021)"></div>
                                </div>
                                <div class="col-1 p-2 text-right v-align-middle d-table-cell">
                                    <div class="text-right" x-text="format(total.y2022)"></div>
                                </div>
                                <div class="col-1 p-2 text-right v-align-middle d-table-cell">
                                    <div class="text-right" x-text="format(total.y2023)"></div>
                                </div>
                                <div class="col-1 p-2 text-right v-align-middle d-table-cell">
                                    <div class="text-right" x-text="format(total.total)"></div>
                                </div>
                            </div>
                        </div>
                    </dd>
                </dl>

            </div>
        </div>

        <div class="my-3"></div>
    </form>
@endsection
