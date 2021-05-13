@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add TRIP: {{$project->title}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('projects.own') }}">Review PAPs</a></li>
                        <li class="breadcrumb-item active">Add TRIP</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

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

            <form action="{{ route('trips.store', ['project' => $project->uuid]) }}" method="POST" class="form-horizontal">
                @csrf
                <div class="row">
                    <!-- Infrastructure Sector -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Infrastructure Sector") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="infrastructure_sectors"
                                           class="col-form-label col-sm-3 required @error('infrastructure_sectors') text-danger @enderror">Infrastructure
                                        Sectors</label>
                                    <div class="col-sm-9">
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
                                </div>

                                <div class="form-group row">
                                    <label for="other_infrastructure" class="col-form-label col-sm-3">Other Infrastructure</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                               class="form-control @error('other_infrastructure') is-invalid @enderror"
                                               name="other_infrastructure" id="other_infrastructure"
                                               placeholder="Other infrastructure"
                                               value="{{ old('other_infrastructure') }}">
                                        @error('other_infrastructure')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="prerequisites" class="col-form-label col-sm-3">Prerequisites</label>
                                    <div class="col-sm-9">
                                        @foreach($prerequisites as $option)
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="prerequisites[]" id="prerequisites_{{$option->id}}" value="{{ $option->id }}" @if(in_array($option->id, old('prerequisities') ?? [])) checked @endif>
                                                    {{ $option->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                        @error('prerequisites')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="risk" class="col-form-label col-sm-3 required">Implementation Risk &amp; Mitigation Strategy </label>
                                    <div class="col-sm-9">
                                        <textarea rows="4" style="resize: none;"
                                                  class="form-control @error('risk') is-invalid @enderror" name="risk"
                                                  placeholder="Implementation Risk and Mitigation Strategy">{{ old('risk') }}</textarea>
                                        @error('risk')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
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
                                <div class="form-group row">
                                    <label for="iccable" class="col-form-label col-sm-3">Does the project have a Right of Way Acquisition (ROWA)
                                        component?</label>
                                    <div class="col-sm-9">
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" value="1" name="has_row" @if(old('has_row') == 1) checked @endif>
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" value="0" name="has_row" @if(old('has_row') == 0) checked @endif>
                                                No
                                            </label>
                                        </div>
                                        @error('has_row')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Schedule of Right of Way Acquisition (ROWA) Cost</label>
                                    <table class="col">
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
                                                <input type="text" class="right_of_way money form-control text-right"
                                                       name="right_of_way[y2017]"
                                                       value="{{ old('right_of_way.y2017', 0) }}">
                                            </td>
                                            <td>
                                                <input type="text" class="right_of_way money form-control text-right"
                                                       name="right_of_way[y2018]"
                                                       value="{{ old('right_of_way.y2018', 0) }}">
                                            </td>
                                            <td>
                                                <input type="text" class="right_of_way money form-control text-right"
                                                       name="right_of_way[y2019]"
                                                       value="{{ old('right_of_way.y2019', 0) }}">
                                            </td>
                                            <td>
                                                <input type="text" class="right_of_way money form-control text-right"
                                                       name="right_of_way[y2020]"
                                                       value="{{ old('right_of_way.y2020', 0) }}">
                                            </td>
                                            <td>
                                                <input type="text" class="right_of_way money form-control text-right"
                                                       name="right_of_way[y2021]"
                                                       value="{{ old('right_of_way.y2021', 0) }}">
                                            </td>
                                            <td>
                                                <input type="text" class="right_of_way money form-control text-right"
                                                       name="right_of_way[y2022]"
                                                       value="{{ old('right_of_way.y2022', 0) }}">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control text-right"
                                                       id="right_of_way_total" readonly>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group row">
                                    <label for="right_of_way[affected_households]" class="col-sm-3 required">No. of affected households</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="right_of_way[affected_households]" value="{{ old('right_of_way.affected_households', 0) }}">
                                    </div>
                                </div>

                                <div class="border-light border-primary border-top my-3"></div>

                                <div class="form-group row">
                                    <label for="iccable" class="col-form-label col-sm-3">Does the project have a Resettlement Action Plan (RAP)
                                        component?</label>
                                    <div class="col-sm-9">
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" value="1" name="has_rap" @if(old('has_rap') == 1) checked @endif>
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" value="0" name="has_rap" @if(old('has_rap') == 0) checked @endif>
                                                No
                                            </label>
                                        </div>
                                        @error('has_rap')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Schedule of Resettlement Action Plan (RAP) Cost</label>
                                    <table class="col">
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
                                                <input type="text" class="resettlement_action_plan money form-control text-right"
                                                       name="resettlement_action_plan[y2017]"
                                                       value="{{ old('resettlement_action_plan.y2017', 0) }}">
                                            </td>
                                            <td>
                                                <input type="text" class="resettlement_action_plan money form-control text-right"
                                                       name="resettlement_action_plan[y2018]"
                                                       value="{{ old('resettlement_action_plan.y2018', 0) }}">
                                            </td>
                                            <td>
                                                <input type="text" class="resettlement_action_plan money form-control text-right"
                                                       name="resettlement_action_plan[y2019]"
                                                       value="{{ old('resettlement_action_plan.y2019', 0) }}">
                                            </td>
                                            <td>
                                                <input type="text" class="resettlement_action_plan money form-control text-right"
                                                       name="resettlement_action_plan[y2020]"
                                                       value="{{ old('resettlement_action_plan.y2020', 0) }}">
                                            </td>
                                            <td>
                                                <input type="text" class="resettlement_action_plan money form-control text-right"
                                                       name="resettlement_action_plan[y2021]"
                                                       value="{{ old('resettlement_action_plan.y2021', 0) }}">
                                            </td>
                                            <td>
                                                <input type="text" class="resettlement_action_plan money form-control text-right"
                                                       name="resettlement_action_plan[y2022]"
                                                       value="{{ old('resettlement_action_plan.y2022', 0) }}">
                                            </td>
                                            <td>
                                                <input type="text" class="money form-control text-right"
                                                       id="resettlement_action_plan_total" readonly>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group row">
                                    <label for="right_of_way.completion_date" class="col-form-label col-sm-3">No. of affected households</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control"
                                               name="resettlement_action_plan[affected_households]"
                                               value="{{ old('resettlement_action_plan.affected_households', 0) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Pre-Investment Requirements -->

                    <!-- Funding Source Breakdown -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Infrastructure Cost by Funding Source") }} </h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover table-sm table-valign-middle" id="fs_infrastructures_table">
                                    <thead>
                                    <tr>
                                        <th class="text-sm text-center">Funding Source</th>
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
                                            <td class="text-sm px-2 text-nowrap">
                                                <input type="hidden"
                                                       name="fs_infrastructures[{{$fs->id}}][fs_id]"
                                                       value="{{ $fs->id }}">
                                                {{ $fs->name }}
                                            </th>
                                            <td><input type="text" class="fs_infrastructures fs_infrastructures_{{ $fs->id }} fs_infrastructures_2016 money form-control text-right"
                                                       name="fs_infrastructures[{{$fs->id}}][y2016]"
                                                       value="{{ old("fs_infrastructures.{$fs->id}.y2016", 0) }}"></td>
                                            <td><input type="text" class="fs_infrastructures fs_infrastructures_{{ $fs->id }} fs_infrastructures_2017 money form-control text-right"
                                                       name="fs_infrastructures[{{$fs->id}}][y2017]"
                                                       value="{{ old("fs_infrastructures.{$fs->id}.y2017", 0) }}"></td>
                                            <td><input type="text" class="fs_infrastructures fs_infrastructures_{{ $fs->id }} fs_infrastructures_2018 money form-control text-right"
                                                       name="fs_infrastructures[{{$fs->id}}][y2018]"
                                                       value="{{ old("fs_infrastructures.{$fs->id}.y2018", 0) }}"></td>
                                            <td><input type="text" class="fs_infrastructures fs_infrastructures_{{ $fs->id }} fs_infrastructures_2019 money form-control text-right"
                                                       name="fs_infrastructures[{{$fs->id}}][y2019]"
                                                       value="{{ old("fs_infrastructures.{$fs->id}.y2019", 0) }}"></td>
                                            <td><input type="text" class="fs_infrastructures fs_infrastructures_{{ $fs->id }} fs_infrastructures_2020 money form-control text-right"
                                                       name="fs_infrastructures[{{$fs->id}}][y2020]"
                                                       value="{{ old("fs_infrastructures.{$fs->id}.y2020", 0) }}"></td>
                                            <td><input type="text" class="fs_infrastructures fs_infrastructures_{{ $fs->id }} fs_infrastructures_2021 money form-control text-right"
                                                       name="fs_infrastructures[{{$fs->id}}][y2021]"
                                                       value="{{ old("fs_infrastructures.{$fs->id}.y2021", 0) }}"></td>
                                            <td><input type="text" class="fs_infrastructures fs_infrastructures_{{ $fs->id }} fs_infrastructures_2022 money form-control text-right"
                                                       name="fs_infrastructures[{{$fs->id}}][y2022]"
                                                       value="{{ old("fs_infrastructures.{$fs->id}.y2022", 0) }}"></td>
                                            <td><input type="text" class="fs_infrastructures fs_infrastructures_{{ $fs->id }} fs_infrastructures_2023 money form-control text-right"
                                                       name="fs_infrastructures[{{$fs->id}}][y2023]"
                                                       value="{{ old("fs_infrastructures.{$fs->id}.y2023", 0) }}"></td>
                                            <td><input type="text" class="form-control text-right" id="fs_infrastructures_{{ $fs->id }}_total" readonly></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th>
                                            <input type="text" class="money form-control text-right" id="fs_infrastructures_2016_total" readonly>
                                        </th>
                                        <th>
                                            <input type="text" class="money form-control text-right" id="fs_infrastructures_2017_total" readonly>
                                        </th>
                                        <th>
                                            <input type="text" class="money form-control text-right" id="fs_infrastructures_2018_total" readonly>
                                        </th>
                                        <th>
                                            <input type="text" class="money form-control text-right" id="fs_infrastructures_2019_total" readonly>
                                        </th>
                                        <th>
                                            <input type="text" class="money form-control text-right" id="fs_infrastructures_2020_total" readonly>
                                        </th>
                                        <th>
                                            <input type="text" class="money form-control text-right" id="fs_infrastructures_2021_total" readonly>
                                        </th>
                                        <th>
                                            <input type="text" class="money form-control text-right" id="fs_infrastructures_2022_total" readonly>
                                        </th>
                                        <th>
                                            <input type="text" class="money form-control text-right" id="fs_infrastructures_2023_total" readonly>
                                        </th>
                                        <th>
                                            <input type="text" class="money form-control text-right" id="fs_infrastructures_total" readonly>
                                        </th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/. Regional Breakdown -->

                    <!-- Regional Breakdown -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Infrastructure Cost by Region") }} </h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover table-sm table-valign-middle" id="region_infrastructures_table">
                                    <thead>
                                    <tr>
                                        <th class="text-sm text-center">Region</th>
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
                                    @foreach ($regions->sortBy('order') as $fs)
                                        @if($fs->id !== 100)
                                        <tr>
                                            <td class="text-sm px-2 text-nowrap">
                                                <input type="hidden"
                                                       name="region_infrastructures[{{$fs->id}}][region_id]"
                                                       value="{{ $fs->id }}">
                                                {{ $fs->label }}
                                            </td>
                                            <td><input type="text" class="region_infrastructures region_infrastructures_{{$fs->id}} region_infrastructures_2016 money form-control text-right"
                                                       name="region_infrastructures[{{$fs->id}}][y2016]"
                                                       value="{{ old("region_infrastructures.{$fs->id}.y2016", 0) }}">
                                            </td>
                                            <td><input type="text" class="region_infrastructures region_infrastructures_{{$fs->id}} region_infrastructures_2017 money form-control text-right"
                                                       name="region_infrastructures[{{$fs->id}}][y2017]"
                                                       value="{{ old("region_infrastructures.{$fs->id}.y2017", 0) }}">
                                            </td>
                                            <td><input type="text" class="region_infrastructures region_infrastructures_{{$fs->id}} region_infrastructures_2018 money form-control text-right"
                                                       name="region_infrastructures[{{$fs->id}}][y2018]"
                                                       value="{{ old("region_infrastructures.{$fs->id}.y2018", 0) }}">
                                            </td>
                                            <td><input type="text" class="region_infrastructures region_infrastructures_{{$fs->id}} region_infrastructures_2019 money form-control text-right"
                                                       name="region_infrastructures[{{$fs->id}}][y2019]"
                                                       value="{{ old("region_infrastructures.{$fs->id}.y2019", 0) }}">
                                            </td>
                                            <td><input type="text" class="region_infrastructures region_infrastructures_{{$fs->id}} region_infrastructures_2020 money form-control text-right"
                                                       name="region_infrastructures[{{$fs->id}}][y2020]"
                                                       value="{{ old("region_infrastructures.{$fs->id}.y2020", 0) }}">
                                            </td>
                                            <td><input type="text" class="region_infrastructures region_infrastructures_{{$fs->id}} region_infrastructures_2021 money form-control text-right"
                                                       name="region_infrastructures[{{$fs->id}}][y2021]"
                                                       value="{{ old("region_infrastructures.{$fs->id}.y2021", 0) }}">
                                            </td>
                                            <td><input type="text" class="region_infrastructures region_infrastructures_{{$fs->id}} region_infrastructures_2022 money form-control text-right"
                                                       name="region_infrastructures[{{$fs->id}}][y2022]"
                                                       value="{{ old("region_infrastructures.{$fs->id}.y2022", 0) }}">
                                            </td>
                                            <td><input type="text" class="region_infrastructures region_infrastructures_{{$fs->id}} region_infrastructures_2023 money form-control text-right"
                                                       name="region_infrastructures[{{$fs->id}}][y2023]"
                                                       value="{{ old("region_infrastructures.{$fs->id}.y2023", 0) }}">
                                            </td>
                                            <td><input type="text" class="form-control text-right" id="region_infrastructures_{{$fs->id}}_total" readonly></td>
                                        </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th>
                                            <input type="text" class="money form-control text-right" id="region_infrastructures_2016_total" readonly>
                                        </th>
                                        <th>
                                            <input type="text" class="money form-control text-right" id="region_infrastructures_2017_total" readonly>
                                        </th>
                                        <th>
                                            <input type="text" class="money form-control text-right" id="region_infrastructures_2018_total" readonly>
                                        </th>
                                        <th>
                                            <input type="text" class="money form-control text-right" id="region_infrastructures_2019_total" readonly>
                                        </th>
                                        <th>
                                            <input type="text" class="money form-control text-right" id="region_infrastructures_2020_total" readonly>
                                        </th>
                                        <th>
                                            <input type="text" class="money form-control text-right" id="region_infrastructures_2021_total" readonly>
                                        </th>
                                        <th>
                                            <input type="text" class="money form-control text-right" id="region_infrastructures_2022_total" readonly>
                                        </th>
                                        <th>
                                            <input type="text" class="money form-control text-right" id="region_infrastructures_2023_total" readonly>
                                        </th>
                                        <th>
                                            <input type="text" class="money form-control text-right" id="region_infrastructures_total" readonly>
                                        </th>
                                    </tr>
                                    </tfoot>
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

@include('trip.script')
