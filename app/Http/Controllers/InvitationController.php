<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvitationStoreRequest;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvitationStoreRequest $request)
    {
        $email = $request->email;

        if (User::where('email', $email)->first()) {
            return back()->with('error', "The email $email is already in use.");
        }

        $invitation = new Invitation($request->all());
        $invitation->generateInvitationToken();
        $invitation->invited_by = auth()->id();
        $invitation->save();

        $user = new User(['email' => $email]);

        $user->notify(new InviteUserToJoinNotification($invitation));

        return back()->with('success','Successfully sent invitation to user.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $token = $request->get('token');
        $invitation = Invitation::where('invitation_token', $token)->firstOrFail();


        return view('auth.register', compact('invitation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
