@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            @if($errors->any())
                <div class="callout callout-danger">
                    <h5><i class="fas fa-info"></i> Error:</h5>
                    Please check the following errors.
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('trips.store', ['project' => $project->slug]) }}" method="POST">
                @csrf
                <div class="row">
                    <!-- Infrastructure Sector -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Infrastructure Sector") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="infrastructure_sectors"
                                           class="@error('infrastructure_sectors') text-danger @enderror">Infrastructure
                                        Sectors <i class="text-danger fas fa-flag"></i></label>
                                    @foreach($infrastructure_sectors as $option)
                                        <div class="form-check">
                                            <label
                                                class="form-check-label @error('infrastructure_sectors') text-danger @enderror"
                                                for="infrastructure_sector_{{ $option->id }}">
                                                <input
                                                    id="infrastructure_sector_{{ $option->id }}"
                                                    type="checkbox"
                                                    value="{{ $option->id }}"
                                                    class="form-check-input"
                                                    name="infrastructure_sectors[]"
                                                    @if(in_array($option->id, old('infrastructure_sectors') ?? [])) checked @endif>
                                                {{ $option->name }}
                                            </label>
                                        </div>
                                        @foreach($option->children as $child)
                                            <div class="ml-4 form-check">
                                                <label for="infrastructure_subsector_{{ $child->id }}"
                                                       class="form-check-label">
                                                    <input type="checkbox"
                                                           id="infrastructure_subsector_{{ $child->id }}"
                                                           value="{{ $child->id }}" name="infrastructure_subsectors[]"
                                                           class="form-check-input"
                                                           @if(in_array($option->id, old('infrastructure_subsectors') ?? [])) checked @endif>
                                                    {{ $child->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endforeach
                                    @error('infrastructure_sectors')<span
                                        class="error invalid-feedback">{{ $message }}</span>@enderror
                                    @error('infrastructure_subsectors')<span
                                        class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="other_infrastructure">Other Infrastructure</label>
                                    <input type="text"
                                           class="form-control @error('other_infrastructure') is-invalid @enderror"
                                           name="other_infrastructure" id="other_infrastructure"
                                           placeholder="Other infrastructure"
                                           value="{{ old('other_infrastructure') }}">
                                    @error('other_infrastructure')<span
                                        class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="risk">Implementation Risk &amp; Mitigation Strategy <i
                                            class="text-danger fas fa-flag"></i></label>
                                    <textarea rows="4" style="resize: none;"
                                              class="form-control @error('risk') is-invalid @enderror" name="risk"
                                              placeholder="Implementation Risk and Mitigation Strategy">{{ old('risk') }}</textarea>
                                    @error('risk')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Infrastructure Sector -->

                    <!-- Pre-Investment Requirements -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Pre-Investment Requirement") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="iccable">Does the project have a Right of Way Acquisition (ROWA)
                                        component?</label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="1" name="has_row" @if(old('has_row') == 1) checked @endif>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="0" name="has_row" @if(old('has_row') == 1) checked @endif>
                                            No
                                        </label>
                                    </div>
                                    @error('has_row')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Schedule of Right of Way Acquisition (ROWA) Cost</label>
                                    <table>
                                        <thead>
                                        <tr>
                                            <th class="text-sm text-center">2017</th>
                                            <th class="text-sm text-center">2018</th>
                                            <th class="text-sm text-center">2019</th>
                                            <th class="text-sm text-center">2020</th>
                                            <th class="text-sm text-center">2021</th>
                                            <th class="text-sm text-center">2022</th>
                                            <th class="text-sm text-center">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <input type="number" class="form-control text-right"
                                                       name="right_of_way[y2017]"
                                                       value="{{ old('right_of_way.y2017', $project->right_of_way->y2017 ?? 0) }}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control text-right"
                                                       name="right_of_way[y2018]"
                                                       value="{{ old('right_of_way.y2018', $project->right_of_way->y2018 ?? 0) }}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control text-right"
                                                       name="right_of_way[y2019]"
                                                       value="{{ old('right_of_way.y2019', $project->right_of_way->y2019 ?? 0) }}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control text-right"
                                                       name="right_of_way[y2020]"
                                                       value="{{ old('right_of_way.y2020', $project->right_of_way->y2020 ?? 0) }}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control text-right"
                                                       name="right_of_way[y2021]"
                                                       value="{{ old('right_of_way.y2021', $project->right_of_way->y2021 ?? 0) }}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control text-right"
                                                       name="right_of_way[y2022]"
                                                       value="{{ old('right_of_way.y2022', $project->right_of_way->y2022 ?? 0) }}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control text-right"
                                                       name="right_of_way[total]">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <label for="right_of_way[affected_households]">No. of affected households</label>
                                    <input type="text" class="form-control" name="right_of_way[affected_households]" value="{{ old('right_of_way[affected_households]', $project->right_of_way->affected_households ?? 0) }}">
                                </div>

                                <div class="form-group">
                                    <label for="iccable">Does the project have a Resettlement Action Plan (RAP)
                                        component?</label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="1" name="has_rap" @if(old('has_rap') == 1 || $project->has_rap == 1) checked @endif>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="0" name="has_rap" @if(old('has_rap') == 0 || $project->has_rap == 0) checked @endif>
                                            No
                                        </label>
                                    </div>
                                    @error('has_rap')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Schedule of Resettlement Action Plan (RAP) Cost</label>
                                    <table>
                                        <thead>
                                        <tr>
                                            <th class="text-sm text-center">2017</th>
                                            <th class="text-sm text-center">2018</th>
                                            <th class="text-sm text-center">2019</th>
                                            <th class="text-sm text-center">2020</th>
                                            <th class="text-sm text-center">2021</th>
                                            <th class="text-sm text-center">2022</th>
                                            <th class="text-sm text-center">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <input type="number" class="form-control text-right"
                                                       name="resettlement_action_plan[y2017]"
                                                       value="{{ old('resettlement_action_plan.y2017', $project->resettlement_action_plan->y2017 ?? 0) }}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control text-right"
                                                       name="resettlement_action_plan[y2018]"
                                                       value="{{ old('resettlement_action_plan.y2018', $project->resettlement_action_plan->y2018 ?? 0) }}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control text-right"
                                                       name="resettlement_action_plan[y2019]"
                                                       value="{{ old('resettlement_action_plan.y2019', $project->resettlement_action_plan->y2019 ?? 0) }}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control text-right"
                                                       name="resettlement_action_plan[y2020]"
                                                       value="{{ old('resettlement_action_plan.y2020', $project->resettlement_action_plan->y2020 ?? 0) }}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control text-right"
                                                       name="resettlement_action_plan[y2021]"
                                                       value="{{ old('resettlement_action_plan.y2021', $project->resettlement_action_plan->y2021 ?? 0) }}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control text-right"
                                                       name="resettlement_action_plan[y2022]"
                                                       value="{{ old('resettlement_action_plan.y2022', $project->resettlement_action_plan->y2022 ?? 0) }}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control text-right"
                                                       name="resettlement_action_plan[total]">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <label for="right_of_way[completion_date]">No. of affected households</label>
                                    <input type="text" class="form-control"
                                           name="resettlement_action_plan[affected_households]"
                                           value="{{ old('resettlement_action_plan[affected_households]', $project->resettlement_action_plan->affected_households ?? 0) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Pre-Investment Requirements -->

                    <!-- Regional Breakdown -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Infrastructure Cost by Region") }} </h3>
                            </div>
                            <div class="card-body">
                                <div class="row px-2 pb-2">
                                    <i class="text-danger fas fa-flag"></i> All fields are required.
                                </div>
                                <table class="table-responsive">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th class="text-sm text-center">2016 &amp; Prior</th>
                                        <th class="text-sm text-center">2017</th>
                                        <th class="text-sm text-center">2018</th>
                                        <th class="text-sm text-center">2019</th>
                                        <th class="text-sm text-center">2020</th>
                                        <th class="text-sm text-center">2021</th>
                                        <th class="text-sm text-center">2022</th>
                                        <th class="text-sm text-center">2023 &amp; Beyond</th>
                                        <th class="text-sm text-center">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($regions as $fs)
                                        <tr>
                                            <th class="text-sm">
                                                <input type="hidden"
                                                       name="region_infrastructures[{{$fs->id}}][region_id]"
                                                       value="{{ $fs->id }}">
                                                {{ $fs->name }}
                                            </th>
                                            <td><input type="number" class="form-control text-right"
                                                       name="region_infrastructures[{{$fs->id}}][y2016]"
                                                       value="{{ old("region_infrastructures.{$fs->id}.y2016", 0) }}">
                                            </td>
                                            <td><input type="number" class="form-control text-right"
                                                       name="region_infrastructures[{{$fs->id}}][y2017]"
                                                       value="{{ old("region_infrastructures.{$fs->id}.y2017", 0) }}">
                                            </td>
                                            <td><input type="number" class="form-control text-right"
                                                       name="region_infrastructures[{{$fs->id}}][y2018]"
                                                       value="{{ old("region_infrastructures.{$fs->id}.y2018", 0) }}">
                                            </td>
                                            <td><input type="number" class="form-control text-right"
                                                       name="region_infrastructures[{{$fs->id}}][y2019]"
                                                       value="{{ old("region_infrastructures.{$fs->id}.y2019", 0) }}">
                                            </td>
                                            <td><input type="number" class="form-control text-right"
                                                       name="region_infrastructures[{{$fs->id}}][y2020]"
                                                       value="{{ old("region_infrastructures.{$fs->id}.y2020", 0) }}">
                                            </td>
                                            <td><input type="number" class="form-control text-right"
                                                       name="region_infrastructures[{{$fs->id}}][y2021]"
                                                       value="{{ old("region_infrastructures.{$fs->id}.y2021", 0) }}">
                                            </td>
                                            <td><input type="number" class="form-control text-right"
                                                       name="region_infrastructures[{{$fs->id}}][y2022]"
                                                       value="{{ old("region_infrastructures.{$fs->id}.y2022", 0) }}">
                                            </td>
                                            <td><input type="number" class="form-control text-right"
                                                       name="region_infrastructures[{{$fs->id}}][y2023]"
                                                       value="{{ old("region_infrastructures.{$fs->id}.y2023", 0) }}">
                                            </td>
                                            <td><input type="number" class="form-control text-right"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/. Regional Breakdown -->

                    <!-- Funding Source Breakdown -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Infrastructure Cost by Funding Source") }} </h3>
                            </div>
                            <div class="card-body">
                                <div class="row px-2 pb-2">
                                    <i class="text-danger fas fa-flag"></i> All fields are required.
                                </div>
                                <table class="table-responsive">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th class="text-sm text-center">2016 &amp; Prior</th>
                                        <th class="text-sm text-center">2017</th>
                                        <th class="text-sm text-center">2018</th>
                                        <th class="text-sm text-center">2019</th>
                                        <th class="text-sm text-center">2020</th>
                                        <th class="text-sm text-center">2021</th>
                                        <th class="text-sm text-center">2022</th>
                                        <th class="text-sm text-center">2023 &amp; Beyond</th>
                                        <th class="text-sm text-center">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($funding_sources as $fs)
                                        <tr>
                                            <th class="text-sm">
                                                <input type="hidden"
                                                       name="fs_infrastructures[{{$fs->id}}][funding_source_id]"
                                                       value="{{ old($fs->id, $fs->id) }}">
                                                {{ $fs->name }}
                                            </th>
                                            <td><input type="number" class="form-control text-right"
                                                       name="fs_infrastructures[{{$fs->id}}][y2016]"
                                                       value="{{ old("fs_infrastructures.{$fs->id}.y2016", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right"
                                                       name="fs_infrastructures[{{$fs->id}}][y2017]"
                                                       value="{{ old("fs_infrastructures.{$fs->id}.y2017", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right"
                                                       name="fs_infrastructures[{{$fs->id}}][y2018]"
                                                       value="{{ old("fs_infrastructures.{$fs->id}.y2018", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right"
                                                       name="fs_infrastructures[{{$fs->id}}][y2019]"
                                                       value="{{ old("fs_infrastructures.{$fs->id}.y2019", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right"
                                                       name="fs_infrastructures[{{$fs->id}}][y2020]"
                                                       value="{{ old("fs_infrastructures.{$fs->id}.y2020", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right"
                                                       name="fs_infrastructures[{{$fs->id}}][y2021]"
                                                       value="{{ old("fs_infrastructures.{$fs->id}.y2021", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right"
                                                       name="fs_infrastructures[{{$fs->id}}][y2022]"
                                                       value="{{ old("fs_infrastructures.{$fs->id}.y2022", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right"
                                                       name="fs_infrastructures[{{$fs->id}}][y2023]"
                                                       value="{{ old("fs_infrastructures.{$fs->id}.y2023", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/. Regional Breakdown -->

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('projects.index') }}" class="btn">Go Back to List</a>
                </div>
            </form>
        </div>
    </section>
@endsection
