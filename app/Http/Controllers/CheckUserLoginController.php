<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckUserLoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->ajax())
        {
            return response()->json(['auth' => auth()->check()], 200);
        }

        return auth()->check();
    }
}
