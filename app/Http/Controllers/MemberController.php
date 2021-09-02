<?php

namespace App\Http\Controllers;

use App\Jobs\SendInvitationForUserToJoinOfficeJob;
use App\Models\Member;
use App\Models\Office;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Office $office)
    {
        $members = $office->members;

        return view('offices.members', compact('members'))
            ->with('office', $office);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Office $office)
    {
        $username = $request->username;

        $user = User::findByUsername($username);

        $member = $office->members()->create([
            'member_id' => $user->id,
            'token'     => Str::random(60),
            'invited_by' => auth()->id(),
        ]);

        dispatch(new SendInvitationForUserToJoinOfficeJob($member));

        return back()
            ->with('success','Successfully sent invitation to user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
