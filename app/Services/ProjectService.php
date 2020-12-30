<?php

namespace App\Services;

use App\Events\CreateProjectEvent;
use App\Events\DeleteProjectEvent;
use App\Events\UpdateProjectEvent;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
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

        // TODO: Add other relationships ensuring that they are also validated

        event(new CreateProjectEvent($project));

        return $project;
    }

    /**
     * @param UpdateProjectRequest $request
     * @param $id
     * @return Project
     */
    public function update(UpdateProjectRequest $request, $id): Project
    {
        // TODO: Create UpdateProjectRequest and implement update logic
        $updatedProject = $this->projectRepository->update($request->validated(), $id);

        event(new UpdateProjectEvent($updatedProject));

        return $updatedProject;
    }

    /**
     * @param int $id
     * @return bool|null
     */
    public function delete(int $id): ?bool
    {
        $project = $this->projectRepository->delete($id);

        event(new DeleteProjectEvent($project));

        return $project;
    }
}
