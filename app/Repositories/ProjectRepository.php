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
        $project->bases()->sync($data['bases']);
        $project->funding_sources()->sync($data['funding_sources']);
        $project->funding_institutions()->sync($data['funding_institutions']);
        $project->implementing_agencies()->sync($data['implementing_agencies']);
        $project->pdp_chapters()->sync($data['pdp_chapters']);
        $project->prerequisites()->sync($data['prerequisites']);
        $project->sdgs()->sync($data['sdgs']);
        $project->ten_point_agendas()->sync($data['ten_point_agendas']);

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
