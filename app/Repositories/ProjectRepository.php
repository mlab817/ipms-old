<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository implements RepositoryInterface
{

    /**
     * @return mixed
     */
    public function all()
    {
        // TODO: Implement all() method.
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $project = Project::create($data);

        $project->regions()->sync($data['regions']);

        return $project;
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        // TODO: Implement show() method.
    }
}
