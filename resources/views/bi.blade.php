@extends('layouts.app')

@section('content')
    <div class="container-xl clearfix px-3 px-md-4 px-lg-5 mt-3">
        <div class="Box">
            <div class="Box-header">
                <h3 class="Box-title">Configurable Report</h3>
            </div>
            <div class="Box-body">
                <div class="d-flex flex-items-start flex-md-row flex-column-reverse pb-4">
                    <div class="col-md-3 flex-self-stretch">
                        <div class="mb-2 d-flex flex-justify-between flex-items-center">
                            <h4>PAP Types</h4>
                        </div>
                        <div class="filter-list">
                            <form action="{{ route('bi') }}" method="GET" id="pap-type-form">
                                @foreach($papTypes as $option)
                                <div class="form-checkbox">
                                    <label>
                                        <input name="pap_types[]" type="checkbox" value="{{ $option->id }}" @if(in_array($option->id, request()->get('pap_types') ?? [])) checked @endif onclick="submitForm()" />
                                        {{ $option->name }}
                                    </label>
                                </div>
                                @endforeach
                                <script>
                                    function submitForm() {
                                        const form = document.getElementById('pap-type-form')
                                        form.submit()
                                    }
                                </script>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-9 pl-md-3 flex-auto flex-self-stretch">
                        {{ $projects->count() }} projects found
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
