<div>
    @if(session()->has('errors'))
        <div class="flash mb-3 flash-error" id="flash-error">
            {{ $errors->first() }}
            <button class="flash-close js-flash-close" type="button" aria-label="Close" onclick="dismiss()">
                <!-- <%= octicon "x" %> -->
                <svg class="octicon octicon-x" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">  <path fill-rule="evenodd" clip-rule="evenodd" d="M3.72 3.72C3.86062 3.57955 4.05125 3.50066 4.25 3.50066C4.44875 3.50066 4.63937 3.57955 4.78 3.72L8 6.94L11.22 3.72C11.2887 3.64631 11.3715 3.58721 11.4635 3.54622C11.5555 3.50523 11.6548 3.48319 11.7555 3.48141C11.8562 3.47963 11.9562 3.49816 12.0496 3.53588C12.143 3.5736 12.2278 3.62974 12.299 3.70096C12.3703 3.77218 12.4264 3.85702 12.4641 3.9504C12.5018 4.04379 12.5204 4.14382 12.5186 4.24452C12.5168 4.34523 12.4948 4.44454 12.4538 4.53654C12.4128 4.62854 12.3537 4.71134 12.28 4.78L9.06 8L12.28 11.22C12.3537 11.2887 12.4128 11.3715 12.4538 11.4635C12.4948 11.5555 12.5168 11.6548 12.5186 11.7555C12.5204 11.8562 12.5018 11.9562 12.4641 12.0496C12.4264 12.143 12.3703 12.2278 12.299 12.299C12.2278 12.3703 12.143 12.4264 12.0496 12.4641C11.9562 12.5018 11.8562 12.5204 11.7555 12.5186C11.6548 12.5168 11.5555 12.4948 11.4635 12.4538C11.3715 12.4128 11.2887 12.3537 11.22 12.28L8 9.06L4.78 12.28C4.63782 12.4125 4.44977 12.4846 4.25547 12.4812C4.06117 12.4777 3.87579 12.399 3.73837 12.2616C3.60096 12.1242 3.52225 11.9388 3.51882 11.7445C3.51539 11.5502 3.58752 11.3622 3.72 11.22L6.94 8L3.72 4.78C3.57955 4.63938 3.50066 4.44875 3.50066 4.25C3.50066 4.05125 3.57955 3.86063 3.72 3.72Z"></path></svg>
            </button>
        </div>
    @endif

    <form id="new_project" aria-label="Create a new repository" action="{{ route('projects.store') }}" accept-charset="UTF-8" method="post">
        @csrf

        <div  class="Subhead hx_Subhead--responsive mb-5">
            <h1  class="Subhead-heading">Create a new program/project</h1>

            <div  class="Subhead-description"> A repository will be created upon PAP creation which will contain all project files, including the revision history, issues, and so on.
                Already have a project/program elsewhere? <a href="{{ route('projects.new_clone') }}">You can clone it, instead.</a>
            </div>
        </div>

        <div class="clearfix">
            <div class="d-block d-sm-none mb-2 clearfix"></div>
            <dl class="form-group mt-1 float-left required" id="title-form-group">
                <dt class="input-label">
                    <label autocapitalize="off" maxlength="255" required="required"
                           aria-describedby="pap-title" for="repository_name">Program/Project Title</label></dt>
                <dd>
                    <div class="position-relative">
                        <input autocapitalize="off"
                               maxlength="255"
                               class="form-control"
                               required=""
                               size="255"
                               type="text"
                               name="title"
                               id="title"
                               autocomplete="off"
                               spellcheck="false"
                               autofocus="autofocus"
                               wire:model.debounce.500ms="title"
                               wire:keydown.escape="clearDuplicates">
                        @if($title && !$hideAutocomplete)
                        <ul class="autocomplete-results">
                            @forelse($duplicates as $duplicate)
                                <li class="autocomplete-item">
                                    <a href="{{ route('projects.show', $duplicate) }}" target="_blank">
                                        {{ '#' . $duplicate->id . ' ' . $duplicate->title }}
                                    </a>
                                </li>
                            @empty
                                <li class="autocomplete-item">No similar titles.</li>
                            @endforelse
                                <footer class="SelectMenu-footer" style="cursor: pointer;" wire:click="clearDuplicates">Press ESC to close</footer>
                        </ul>
                        @endif
                    </div>
                </dd>

            </dl>
        </div>

        <div class="js-with-permission-fields">

            <hr aria-hidden="true">

            <div class="form-group required">
                <!-- privacy options -->
                @foreach($pap_types as $pap_type)
                    <div class="form-checkbox">
                        <label class="js-privacy-toggle-label-public">
                            <input class="mt-2" aria-describedby="public-description" type="radio" name="pap_type_id" wire:model="papTypeId" value="{{ $pap_type->id }}">
                            {{ $pap_type->name }}
                        </label>
                        <svg height="32" class="octicon octicon-repo float-left mt-1 mr-2" viewBox="0 0 24 24" version="1.1"
                             width="32" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M3 2.75A2.75 2.75 0 015.75 0h14.5a.75.75 0 01.75.75v20.5a.75.75 0 01-.75.75h-6a.75.75 0 010-1.5h5.25v-4H6A1.5 1.5 0 004.5 18v.75c0 .716.43 1.334 1.05 1.605a.75.75 0 01-.6 1.374A3.25 3.25 0 013 18.75v-16zM19.5 1.5V15H6c-.546 0-1.059.146-1.5.401V2.75c0-.69.56-1.25 1.25-1.25H19.5z"></path>
                            <path
                                d="M7 18.25a.25.25 0 01.25-.25h5a.25.25 0 01.25.25v5.01a.25.25 0 01-.397.201l-2.206-1.604a.25.25 0 00-.294 0L7.397 23.46a.25.25 0 01-.397-.2v-5.01z"></path>
                        </svg>
                        <span class="js-public-description note">
                        {{ $pap_type->description }}
                    </span>
                    </div>
            @endforeach
            <!-- upgrade upsell -->
            </div>

            <hr aria-hidden="true">

            <button type="submit" class="btn-primary btn">
                Create program/project
            </button>
        </div>
    </form>
</div>
