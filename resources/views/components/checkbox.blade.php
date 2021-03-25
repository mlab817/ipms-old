<fieldset>
    <div>
        <legend class="text-sm font-medium text-gray-900">{{ $label }}</legend>
        @if($caption)<p class="text-sm text-gray-500">{{ $caption }}</p>@endif
    </div>
    <div class="mt-4 space-y-4">
        @foreach($options as $option)
        <div class="flex items-start">
            <div class="flex items-center h-5">
                <input name="{{ $name }}" value="{{ $option->value }}" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
            </div>
            <div class="ml-3 text-sm">
                <label for="comments" class="font-medium text-gray-700">{{ $option->label }}</label>
            </div>
        </div>
        @endforeach
    </div>
</fieldset>
