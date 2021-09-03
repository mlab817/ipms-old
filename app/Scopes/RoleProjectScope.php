<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class RoleProjectScope implements Scope
{
    /**
     * @param Builder $builder
     * @param Model $model
     */
    public function apply(Builder $builder, Model $model)
    {
        // get user current role
        $roleName = auth()->user()->currentRole->name ?? '';
        $officeId = auth()->user()->office_id ?? null;

        if (in_array($roleName,['focal.main','focal'])) {
            $builder->where('office_id', $officeId);
        }
    }
}
