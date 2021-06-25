<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function logins()
    {
        return view('account.logins')
            ->with('logins', auth()->user()->logins()->paginate());
    }
}
