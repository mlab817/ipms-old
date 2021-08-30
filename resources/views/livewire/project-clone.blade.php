<div>
    <input type="hidden" name="id" wire:model="projectId">
    <input autofocus autocomplete="off" type="search" name="project_id" id="project_id" wire:model.debounce.500ms="search" placeholder="Type to search" class="form-control input-contrast input-block">
    @if($search && !$project)
        <ul class="autocomplete-results">
            @forelse($results as $result)
                <li class="autocomplete-item" wire:click="setProject({{ $result->id }})">
                    <small>{{ '#'. $result->id }}</small>
                    <span>
                        {{ $result->title }}
                    </span>
                </li>
            @empty
                <li class="autocomplete-item">Nothing found</li>
            @endforelse
        </ul>
    @endif
</div>
