<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RolesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Authorize Role class
     *
     * RoleController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Role::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RolesDataTable $dataTable)
    {
        return $dataTable->render('admin.roles.index', [
            'pageTitle' => 'Roles',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create', [
            'pageTitle' => 'Create Role',
            'permissions' => Permission::all(),
            'guards'        => [
                'web'   => 'web',
                'api'   => 'api',
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request)
    {
        $role = Role::create([
            'name'          => $request->name,
            'guard_name'    => $request->guard_name,
        ]);

        $role->givePermissionTo($request->permissions);

        $role->description = $request->description;
        $role->save();

        Alert::success('Sucess', 'Successfully saved item');

        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', [
            'pageTitle' => 'Edit Role',
            'permissions' => Permission::all(),
            'guards'        => [
                'web'   => 'web',
                'api'   => 'api',
            ],
            'role' => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {
        $role->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
        ]);

        $role->syncPermissions($request->permissions);

        $role->description = $request->description;
        $role->save();

        Alert::success('Sucess', 'Successfully updated item');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        Alert::success('Sucess', 'Successfully deleted item');

        return redirect()->route('admin.roles.index');
    }
}
