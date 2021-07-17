<?php

namespace App\Http\Livewire;

use App\Jobs\ProjectCloneJob;
use App\Models\Project;
use Livewire\Component;

class ProjectClone extends Component
{
    public $search = '';

    public $project;

    public function updatingSearch()
    {
        $this->project = null;
    }

    public function clearMessage()
    {
        session()->forget('message');
    }

    public function setProject($projectId)
    {
        $this->project = Project::find($projectId);
        $this->search = '#' . $this->project->id . ' ' . $this->project->title;
    }

    public function cloneProject()
    {
        dispatch(new ProjectCloneJob($this->project->id, config('ipms.current_updating_period'), auth()->id()));

        session()->flash('message','Successfully cloned project/program');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.project-clone', [
            'results' => $this->search
                ? Project::where('title','like','%'. $this->search . '%')
                    ->where('updating_period_id', '<>', config('ipms.current_updating_period'))->paginate(15)
                : []
        ]);
    }
}
