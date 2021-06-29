<div
    x-data="
        {
             isEditing: false,
             focus: function() {
                const textInput = this.$refs.textInput;
                textInput.focus();
                textInput.select();
             }
        }
    "
>
    <div
        x-show="!isEditing"
    >
        <span
            x-on:click="isEditing = true; $nextTick(() => focus())"
        >{{ $origValue ? $origValue : 'Untitled' }}</span>
    </div>
    <div x-show="isEditing" style="display: none;">
        <form wire:submit.prevent="save" class="flex">
            <input
                type="text"
                class="form-control"
                placeholder="100 characters max."
                x-ref="textInput"
                wire:model.lazy="editedValue"
            >
            <button type="button" class="btn-link ml-1" title="Cancel" x-on:click="isEditing = false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" class="octicon octicon-x">
                    <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"/>
                </svg>
            </button>
            <button
                type="submit"
                class="btn-link ml-1"
                title="Save"
                x-on:click="isEditing = false"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" class="octicon octicon-check">
                    <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"/>
                </svg>
            </button>
        </form>
    </div>
</div>
