<div class="Box">
    <div class="Box-header">
        <h3 class="Box-title">Site-wide Settings</h3>
    </div>
    <div class="Box-body p-0">
        @foreach($settings as $setting)
        <div class="d-flex m-3" wire:key="setting_{{$setting->id}}">
            <div class="col-6 mr-1">
                <input readonly type="text" class="form-control input-contrast width-full" value="{{ $setting->key }}" placeholder="key">
            </div>
            <div class="col-6 mr-1">
                <input readonly type="text" class="form-control input-contrast width-full" value="{{ $setting->value }}" placeholder="value">
            </div>
            <button type="button" class="btn-octicon" wire:click="editSetting({{ $setting }})">
                <svg class="octicon octicon-pencil" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z"></path></svg>
            </button>
        </div>
        @endforeach

        @if($isEditing)
        <form wire:submit.prevent="saveSetting" accept-charset="UTF-8" method="POST">
            <div class="d-flex m-3">
                <div class="col-6 mr-1">
                    <input type="text" class="form-control input-contrast width-full" name="key" id="key" wire:model="key" placeholder="key">
                </div>
                <div class="col-6 mr-1">
                    <input type="text" class="form-control input-contrast width-full" name="value" id="value" wire:model="value" placeholder="value">
                </div>
                <button type="submit" class="btn-octicon">
                    <svg class="octicon octicon-check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path></svg>
                </button>
            </div>
        </form>
        @else
        <div class="mx-3 mb-3">
            <button type="button" class="btn" wire:click="newSetting()">New</button>
        </div>
        @endif
    </div>
</div>
