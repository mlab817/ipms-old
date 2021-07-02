<div>
    <div class="Box">
        <div class="Box-header color-bg-canvas">
            <h3 class="Box-title">
                PIPOL Entry
            </h3>
        </div>
        <div class="Box-body" x-data="{ addMode: false }">
            @if (! $project->pipol)
                <div class="blankslate" x-show="!addMode">
                    <img src="https://ghicons.github.com/assets/images/blue/png/Pull%20request.png" alt="" class="mb-3" />
                    <h3 class="mb-1">This PAP doesn’t seem to have a PIPOL Entry yet.</h3>
                    <p>
                        The Public Investment Program Online (PIPOL) System is the official
                        data entry system for inclusion of PAPs in the updated PIP. Create
                        an entry for this PAP to ensure its inclusion.
                    </p>
                    <button class="btn btn-primary my-3" type="button" @click="addMode = true">New</button>
{{--                    <p>--}}
                    <!-- TODO: Create a learn more button -->
{{--                        <button class="btn-link" type="button">Learn more</button>--}}
{{--                    </p>--}}
                </div>

                <form x-cloak x-show="addMode" action="{{ route('projects.pipols.store', $project) }}" method="POST" accept-charset="UTF-8">
                    @csrf
                    @method('POST')
                    <dl class="form-group my-3">
                        <dt class="input-label">
                            <label for="pipol_code">PIPOL Title</label>
                        </dt>
                        <dd class="form-group-body">
                            <input type="text" class="form-control" placeholder="PIPOL Title" id="title" name="title">
                            <p class="note">The PIPOL Title should match the title of the PAP in the PIPOL System.</p>
                        </dd>
                    </dl>

                    <dl class="form-group my-3">
                        <dt class="input-label">
                            <label for="pipol_code">PIPOL Code</label>
                        </dt>
                        <dd class="form-group-body">
                            <input type="text" class="form-control" placeholder="PIPOL Code" id="pipol_code" name="pipol_code">
                            <p class="note">The PIPOL Code is the unique identifier of a PAP in the PIPOL System.</p>
                        </dd>
                    </dl>

                    <dl class="form-group my-3">
                        <dt class="input-label">
                            <label for="pipol_code">PIPOL URL</label>
                        </dt>
                        <dd class="form-group-body">
                            <input type="text" class="form-control" placeholder="PIPOL URL" id="pipol_url" name="pipol_url">
                            <p class="note">The PIPOL URL is the URL address of the PAP in the PIPOL System. Please input the entire URL.</p>
                        </dd>
                    </dl>

                    <dl class="form-group my-3">
                        <dt class="input-label">
                            <label for="pipol_code">PIPOL Status</label>
                        </dt>
                        <dd class="form-group-body">
                            <select type="text" class="form-select" id="submission_status" name="submission_status">
                                <option value="draft" selected>Draft</option>
                                <option value="endorsed">Endorsed</option>
                            </select>
                            <p class="note">The status of the PAP in the PIPOL System.</p>
                        </dd>
                    </dl>

                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <button type="button" @click="addMode = false" class="btn btn-sm">Cancel</button>
                </form>
            @else
                <dl class="form-group my-3">
                    <dt class="input-label">
                        <label for="pipol_code">PIPOL Title</label>
                    </dt>
                    <dd class="form-group-body" x-data="{ isEditing: false, project_title: '{{ $project->pipol->project_title }}' }">
                        <form action="{{ route('projects.pipols.update', ['project' => $project, 'pipol' => $project->pipol]) }}" method="POST" accept-charset="UTF-8">
                            @csrf
                            @method('PATCH')
                            <input @click="isEditing = true" @click.away="isEditing = false" x-model="project_title" type="text" class="form-control" placeholder="PIPOL Title" id="project_title" name="project_title" value="{{ $project->pipol->project_title }}">
                            <button x-show="isEditing" x-cloak x-bind:disabled="project_title === '{{ $project->pipol->project_title }}'" type="submit" class="btn btn-primary">Save</button>
                            <button x-show="isEditing" x-cloak @click="isEditing = false; $nextTick(() => (project_title = '{{ $project->pipol->project_title }}'));" type="button" class="btn">Cancel</button>
                            <p class="note">The PIPOL Title should match the title of the PAP in the PIPOL System.</p>
                        </form>
                    </dd>
                </dl>

                <dl class="form-group my-3">
                    <dt class="input-label">
                        <label for="pipol_code">PIPOL Code</label>
                    </dt>
                    <dd class="form-group-body" x-data="{ isEditing: false, pipol_code: '{{ $project->pipol->pipol_code }}' }">
                        <form action="{{ route('projects.pipols.update', ['project' => $project, 'pipol' => $project->pipol]) }}" method="POST" accept-charset="UTF-8">
                            @csrf
                            @method('PATCH')
                            <input @click="isEditing = true" @click.away="isEditing = false" x-model="pipol_code" type="text" class="form-control" placeholder="PIPOL Code" id="pipol_code" name="pipol_code" value="{{ $project->pipol->pipol_code }}">
                            <button x-cloak x-show="isEditing" type="submit" class="btn btn-primary" x-bind:disabled="pipol_code === '{{ $project->pipol->pipol_code }}'">Save</button>
                            <button x-cloak x-show="isEditing" @click="isEditing = false; $nextTick(() => (pipol_code = '{{ $project->pipol->pipol_code }}'));" type="button" class="btn">Cancel</button>
                        </form>
                        <p class="note">The PIPOL Code is the unique identifier of a PAP in the PIPOL System.</p>
                    </dd>
                </dl>

                <dl class="form-group my-3">
                    <dt class="input-label">
                        <label for="pipol_url">PIPOL URL</label>
                    </dt>
                    <dd class="form-group-body" x-data="{ isEditing: false, pipol_url: '{{ $project->pipol->pipol_url }}' }">
                        <form action="{{ route('projects.pipols.update', ['project' => $project, 'pipol' => $project->pipol]) }}" method="POST" accept-charset="UTF-8">
                            @csrf
                            @method('PATCH')
                            <input @click="isEditing = true" @click.away="isEditing = false" x-model="pipol_url" type="text" class="form-control" placeholder="PIPOL URL" id="pipol_url" name="pipol_url" value="{{ $project->pipol->pipol_url }}">
                            <button x-show="isEditing" x-cloak type="submit" class="btn btn-primary" x-bind:disabled="pipol_url === '{{ $project->pipol->pipol_url }}'">Save</button>
                            <button x-show="isEditing" x-cloak @click="isEditing = false; $nextTick(() => (pipol_url = '{{ $project->pipol->pipol_url }}'));" type="button" class="btn">Cancel</button>
                        </form>
                    </dd>
                </dl>

                <dl class="form-group my-3">
                    <dt class="input-label">
                        <label for="pipol_code">PIPOL Status</label>
                    </dt>
                    <dd class="form-group-body" x-data="{
                        isEditing: false,
                        submission_status: '{{ $project->pipol->submission_status }}',
                        reason_id: {{ (int) $project->pipol->reason_id }},
                        other_reason: '{{ $project->pipol->other_reason }}'
                    }">
                        <form action="{{ route('projects.pipols.update', ['project' => $project, 'pipol' => $project->pipol]) }}" method="POST" accept-charset="UTF-8">
                            @csrf
                            @method('PATCH')
                            <select x-model="submission_status" type="text" class="form-select" id="submission_status" name="submission_status">
                                @foreach(\App\Models\Pipol::SUBMISSION_STATUS as $key => $label)
                                <option value="{{ $key }}">{{ $label }}</option>
                                @endforeach
                            </select>
                            <button x-cloak type="submit" class="btn btn-primary" x-show="submission_status !== '{{ $project->pipol->submission_status }}'">Save</button>
                            <p class="note">The status of the PAP in the PIPOL System.</p>
                        </form>
                    </dd>
                </dl>

                @if ($project->pipol->submission_status == 'DROPPED')
                <dl class="form-group my-3">
                    <dt class="input-label">
                        <label for="pipol_url">Select reason for dropping PAP: </label>
                    </dt>
                    <dd class="form-group-body" x-data="{ isEditing: false, reason_id: '{{ $project->pipol->reason_id }}' }">
                        <form action="{{ route('projects.pipols.update', ['project' => $project, 'pipol' => $project->pipol]) }}" method="POST" accept-charset="UTF-8">
                            @csrf
                            @method('PATCH')
                            <select x-model="reason_id" type="text" class="form-select" id="reason_id" name="reason_id">
                                @foreach(\App\Models\Reason::all() as $reason)
                                    <option value="{{ $reason->id }}">{{ $reason->name }}</option>
                                @endforeach
                            </select>
                            <button x-cloak type="submit" class="btn btn-primary" x-show="reason_id !== '{{ $project->pipol->reason_id }}'">Save</button>
                        </form>
                    </dd>
                </dl>

                <dl class="form-group my-3">
                    <dt class="input-label">
                        <label for="pipol_url">Specify reason for dropping: </label>
                    </dt>
                    <dd class="form-group-body" x-data="{ isEditing: false, other_reason: '{{ $project->pipol->other_reason }}' }">
                        <form action="{{ route('projects.pipols.update', ['project' => $project, 'pipol' => $project->pipol]) }}" method="POST" accept-charset="UTF-8">
                            @csrf
                            @method('PATCH')
                            <textarea @click="isEditing = true" @click.away="isEditing = false" x-model="other_reason" name="other_reason" id="other_reason" class="form-control mb-2"></textarea>
                            <button x-cloak x-show="isEditing" type="submit" class="btn btn-primary" x-bind:disabled="other_reason === '{{ $project->pipol->other_reason }}'">Save</button>
                            <button x-cloak x-show="isEditing" @click="isEditing = false; $nextTick(() => (other_reason = '{{ $project->pipol->other_reason }}'));" type="button" class="btn">Cancel</button>
                        </form>
                    </dd>
                </dl>
                @endif
            @endif
        </div>

    </div>
</div>
