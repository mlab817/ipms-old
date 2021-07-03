<div class="position-relative" style="min-width: 250px; max-width: 330px;">
    <input wire:model.debounce.250ms="search" class="form-control input-dark input-block mr-3" aria-label="Search" placeholder="Search" type="search" name="search" id="search" role="searchbox" autocomplete="off">

    @if($search && count($projects))
    <ul class="autocomplete-results">
        @forelse($projects as $project)
            <a href="{{ route('projects.show', $project) }}" class="autocomplete-item">
                {{ $project->title }}
            </a>
        @empty
            <li class="autocomplete-item">No project found</li>
        @endforelse
    </ul>
    @endif
</div>
