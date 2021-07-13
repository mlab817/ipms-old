<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectNotification;
use Illuminate\Http\Request;

class ProjectNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::whereHas('project_notifications', function ($notification) {
            return $notification->where('receiver_id', auth()->id());
        })->get();

        return view('users.notifications.index',compact('projects'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectNotification  $projectNotification
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectNotification $projectNotification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectNotification  $projectNotification
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectNotification $projectNotification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectNotification  $projectNotification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectNotification $projectNotification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectNotification  $projectNotification
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectNotification $projectNotification)
    {
        //
    }
}
