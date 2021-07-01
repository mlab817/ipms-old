<pre>
    @json($project, JSON_PRETTY_PRINT)
</pre>

{{--@extends('layouts.admin')--}}

{{--@section('styles')--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/3.21.0/codemirror.min.css" />--}}
{{--    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />--}}
{{--@endsection--}}

{{--@section('content')--}}
{{--    <livewire:admin-table />--}}



{{--<div id="results"></div>--}}
{{--@endsection--}}

{{--@push('scripts')--}}
{{--    <script src="{{ mix('js/app.js') }}"></script>--}}
{{--    <script>--}}
{{--        console.log(jsondiffpatch)--}}
{{--        let left = @json(json_decode(\App\Models\Commit::find(1)->commit));--}}
{{--        let right = @json(json_decode(\App\Models\Commit::find(2)->commit));--}}
{{--        let changes = jsondiffpatch.diff(left, right)--}}
{{--        document.getElementById('results').innerHTML = formatters.html.format(changes, left)--}}
{{--    </script>--}}
{{--@endpush--}}
