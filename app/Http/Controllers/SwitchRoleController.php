<?php

namespace App\Http\Controllers;

use App\Http\Requests\SwitchRoleRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

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
        auth()->user()->syncRoles($request->active_role);

        Alert::success('Success','Successfully switched role');

        return redirect()->route('dashboard');
    }
}
