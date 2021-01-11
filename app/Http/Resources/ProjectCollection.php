<?php

namespace App\Http\Resources;

use App\Http\Controllers\Api\ProjectController;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Str;
use Spatie\ResourceLinks\HasLinks;

class ProjectCollection extends ResourceCollection
{
    use HasLinks;

    public $collects = Project::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'data'  => $this->collection->transform(function (Project $project) {
                return [
                    'id'            => $project->id,
                    'title'         => $project->title,
                    'slug'          => $project->slug,
                    'description'   => $project->description,
                    'pap_type'      => new PapTypeResource($project->pap_type),
                    'office'        => new OfficeResource($project->office),
                    'permissions'   => (array) $project->permissions,
                    'updated_at'    => (string) $project->updated_at,
                    'creator'       => $project->creator ? new UserResource($project->creator) : null,
                ];
            }),
        ];
    }
}
