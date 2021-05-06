<?php

namespace App\Http\Controllers;

use App\Models\ApprovalLevel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $menuItems = collect();
        $menuItems->push([
            'title' => 'Approval Levels',
            'value' =>  ApprovalLevel::count(),
        ]);

        return view('admin.index', [
            'menuItems' => []
        ]);
    }
}
