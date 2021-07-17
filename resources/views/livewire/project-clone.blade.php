<div class="container-lg mx-auto">
    @if(session()->has('message'))
    <div class="flash mt-3 flash-success">
        <!-- <%= octicon "shield-check" %> -->
        <svg class="octicon octicon-shield-check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">  <path fill-rule="evenodd" clip-rule="evenodd" d="M8.53336 0.133063C8.18645 0.0220524 7.81355 0.0220518 7.46664 0.133062L2.21664 1.81306C1.49183 2.045 1 2.71878 1 3.4798V6.99985C1 8.5659 1.31923 10.1823 2.3032 11.682C3.28631 13.1805 4.88836 14.4946 7.33508 15.5367C7.75909 15.7173 8.24091 15.7173 8.66493 15.5367C11.1116 14.4946 12.7137 13.1805 13.6968 11.682C14.6808 10.1823 15 8.5659 15 6.99985V3.4798C15 2.71878 14.5082 2.045 13.7834 1.81306L8.53336 0.133063ZM7.92381 1.5617C7.97336 1.54584 8.02664 1.54584 8.07619 1.5617L13.3262 3.2417C13.4297 3.27483 13.5 3.37109 13.5 3.4798V6.99985C13.5 8.35818 13.2253 9.66618 12.4426 10.8592C11.6591 12.0535 10.3216 13.2007 8.07713 14.1567C8.02866 14.1773 7.97134 14.1773 7.92287 14.1567C5.67838 13.2007 4.34094 12.0535 3.55737 10.8592C2.77465 9.66618 2.5 8.35818 2.5 6.99985V3.4798C2.5 3.37109 2.57026 3.27483 2.67381 3.2417L7.92381 1.5617ZM11.2803 6.28021C11.5732 5.98731 11.5732 5.51244 11.2803 5.21955C10.9874 4.92665 10.5126 4.92665 10.2197 5.21955L7.25 8.18922L6.28033 7.21955C5.98744 6.92665 5.51256 6.92665 5.21967 7.21955C4.92678 7.51244 4.92678 7.98731 5.21967 8.28021L6.71967 9.78021C7.01256 10.0731 7.48744 10.0731 7.78033 9.78021L11.2803 6.28021Z"></path></svg>
        {{ session('message') }}
        <button class="flash-close js-flash-close" type="button" aria-label="Close" wire:click="clearMessage">
            <!-- <%= octicon "x" %> -->
            <svg class="octicon octicon-x" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">  <path fill-rule="evenodd" clip-rule="evenodd" d="M3.72 3.72C3.86062 3.57955 4.05125 3.50066 4.25 3.50066C4.44875 3.50066 4.63937 3.57955 4.78 3.72L8 6.94L11.22 3.72C11.2887 3.64631 11.3715 3.58721 11.4635 3.54622C11.5555 3.50523 11.6548 3.48319 11.7555 3.48141C11.8562 3.47963 11.9562 3.49816 12.0496 3.53588C12.143 3.5736 12.2278 3.62974 12.299 3.70096C12.3703 3.77218 12.4264 3.85702 12.4641 3.9504C12.5018 4.04379 12.5204 4.14382 12.5186 4.24452C12.5168 4.34523 12.4948 4.44454 12.4538 4.53654C12.4128 4.62854 12.3537 4.71134 12.28 4.78L9.06 8L12.28 11.22C12.3537 11.2887 12.4128 11.3715 12.4538 11.4635C12.4948 11.5555 12.5168 11.6548 12.5186 11.7555C12.5204 11.8562 12.5018 11.9562 12.4641 12.0496C12.4264 12.143 12.3703 12.2278 12.299 12.299C12.2278 12.3703 12.143 12.4264 12.0496 12.4641C11.9562 12.5018 11.8562 12.5204 11.7555 12.5186C11.6548 12.5168 11.5555 12.4948 11.4635 12.4538C11.3715 12.4128 11.2887 12.3537 11.22 12.28L8 9.06L4.78 12.28C4.63782 12.4125 4.44977 12.4846 4.25547 12.4812C4.06117 12.4777 3.87579 12.399 3.73837 12.2616C3.60096 12.1242 3.52225 11.9388 3.51882 11.7445C3.51539 11.5502 3.58752 11.3622 3.72 11.22L6.94 8L3.72 4.78C3.57955 4.63938 3.50066 4.44875 3.50066 4.25C3.50066 4.05125 3.57955 3.86063 3.72 3.72Z"></path></svg>
        </button>
    </div>
    @endif

    <div class="Subhead Subhead--spacious mt-3 mb-5">
        <h2 class="Subhead-heading">Clone a project/program</h2>
        <div class="Subhead-description">
            Create a clone for program/project to prepare them for submission
            during the current updating period.
        </div>
    </div>

    <form wire:submit.prevent="cloneProject">
        <div class="clearfix mb-5">
            <dl class="m-0">
                <dt>
                    <h3 class="mb-2">
                        <label class="text-normal" for="">
                            Find the program/project
                        </label>
                    </h3>
                </dt>
                <dd>
                    <div class="position-relative">
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
                </dd>
            </dl>
        </div>

        <div class="form-actions border-top pt-4">
            <button type="submit" class="btn btn-primary" @if(!$project) disabled @endif>Begin clone</button>
        </div>
    </form>
</div>
