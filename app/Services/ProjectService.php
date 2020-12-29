<?php

namespace App\Services;

use App\Events\CreateProjectEvent;
use App\Http\Requests\CreateProjectRequest;
use App\Repositories\ProjectRepository;

class ProjectService
{
    public $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function create(CreateProjectRequest $request)
    {
        $validated = $request->validated();

        $project = $this->projectRepository->create($validated);

        event(new CreateProjectEvent($project));

        return $project;
    }
}
