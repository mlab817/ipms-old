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

        // belongs to many - sync relations
//        $project->regions()->sync($data['regions']);
//        $project->bases()->sync($data['bases']);
//        $project->funding_sources()->sync($data['funding_sources']);
//        $project->funding_institutions()->sync($data['funding_institutions']);
//        $project->implementing_agencies()->sync($data['implementing_agencies']);
//        $project->pdp_chapters()->sync($data['pdp_chapters']);
//        $project->prerequisites()->sync($data['prerequisites']);
//        $project->sdgs()->sync($data['sdgs']);
//        $project->ten_point_agendas()->sync($data['ten_point_agendas']);
//
//        $project->allocation()->create($data['allocation']);
//        $project->disbursement()->create($data['disbursement']);
//        $project->feasibility_study()->create($data['feasibility_study']);
//        $project->nep()->create($data['nep']);
//        $project->resettlement_action_plan()->create($data['resettlement_action_plan']);
//        $project->right_of_way()->create($data['right_of_way']);

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
        $project = Project::findOrFail($id);

        $projectToDelete = $project->toArray();

        $project->delete();

        return $projectToDelete;
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
