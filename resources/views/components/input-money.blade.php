<div x-data="{
    value: {{ $value ?? 0 }},
    type: 'text',
    onFocus() {
        this.type = 'number';
        const value = this.value;
        this.value = value ? value.replace(/,/g, '') : 0;
    },
    onBlur() {
        const value = this.value;
        this.type = 'text';
        this.value = Number(value).toLocaleString('en-US');
    }
}">
    <input
        :type="type"
        id="{{ $name }}"
        name="{{ $name }}"
        x-model="value"
        class="form-control text-right"
        x-on:focus="onFocus()"
        x-on:click="onFocus()"
        x-on:blur="onBlur()">
</div>
