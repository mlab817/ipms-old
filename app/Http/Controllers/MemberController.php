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
        $accept = $request->accept;
        $officeId = $member->office_id;

        if ($accept) {
            $member->accept();
        } else {
            $member->delete();
        }

        return redirect()->route('offices.show', Office::find($officeId));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return back()->with('success','Successfully cancelled invitation.');
    }

    public function invitation(Request $request, Office $office)
    {
        // look for invitation for the user
        $member = Member::where('member_id', auth()->id())->first();

        $member->load('user','office','inviter');

        // if member has already accepted the invitation, redirect them to the office page
        if ($member->accepted_at) {
            return redirect()->route('offices.show', $office)
                ->with('error','You have already joined this office.');
        }

        return view('offices.invitation', compact('member'));
    }
}
