<fieldset>
    <div>
        <legend class="block font-medium text-sm text-gray-700">{{ $label }}</legend>
        @if($caption)<p class="text-sm text-gray-500">{{ $caption }}</p>@endif
    </div>
    <div class="mt-4 space-y-4">
        @foreach($options as $option)
            <div class="flex items-center">
                <label for="{{ $option->label }}" class="ml-3 block text-sm font-medium text-gray-700">
                    <input type="radio" id="{{ $option->value }}" name="{{ $name }}" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" value="{{ $option->value }}">
                    {{ $option->label }}
                </label>
            </div>
        @endforeach
    </div>
</fieldset>
