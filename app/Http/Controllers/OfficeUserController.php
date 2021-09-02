<?php

namespace App\Http\Controllers;

use App\Jobs\SendInvitationForUserToJoinOfficeJob;
use App\Models\Office;
use App\Models\User;
use Illuminate\Http\Request;

class OfficeUserController extends Controller
{
    /**
     * Send invitation to user
     *
     * @param Request $request
     * @param Office $office
     */
    public function store(Request $request, Office $office)
    {

    }
}
