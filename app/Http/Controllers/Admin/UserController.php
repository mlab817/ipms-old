<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UsersDataTable;
use App\Events\UserCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserDeleteRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\Office;
use App\Models\Permission;
use App\Models\User;
use App\Notifications\UserDeletedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.users.index', [
            'pageTitle' => 'Users',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', [
            'pageTitle' => 'Add New User',
            'roles'     => Role::all(),
            'offices'   => Office::all(),
            'permissions'=> Permission::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password'),
            'office_id' => $request->office_id,
        ]);

        $user->assignRole($request->roles);
        $user->syncPermissions($request->permissions);

        if ($request->has('activated')) {
            $user->activate();
        }

        event(new UserCreated($user));

        Alert::success('Succes','User successfully created');

        return redirect()->route('admin.users.index');
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
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'pageTitle' => 'Edit User',
            'roles'     => Role::all(),
            'user'      => $user,
            'offices'   => Office::all(),
            'permissions'=> Permission::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            'name'      => $request->name,
            'office_id' => $request->office_id,
        ]);

        $user->roles()->sync($request->roles);
        $user->syncPermissions($request->permissions);

        if ($request->has('activated')) {
            $user->activate();
        } else {
            $user->deactivate();
        }

        Alert::success('Success','User successfully updated');

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDeleteRequest $request, User $user)
    {
        $user->delete();

        $user->notify(new UserDeletedNotification($request->reason));

        Alert::success('User has been deleted');

        return redirect()->route('admin.users.index');
    }
}
