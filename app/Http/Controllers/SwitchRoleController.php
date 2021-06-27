<?php

namespace App\Http\Controllers;

use App\Http\Requests\SwitchRoleRequest;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;

class SwitchRoleController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(SwitchRoleRequest $request)
    {
        auth()->user()->switchRole($request->roleId);

        return redirect()->route('dashboard');
    }
}
