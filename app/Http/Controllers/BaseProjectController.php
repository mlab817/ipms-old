<?php

namespace App\Http\Controllers;

use App\Http\Requests\BaseProjectStoreRequest;
use App\Models\BaseProject;
use App\Models\PapType;
use App\Models\User;
use Illuminate\Http\Request;

class BaseProjectController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('base-projects.create')
            ->with(['pap_types' => PapType::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BaseProjectStoreRequest $request)
    {
        $owner = $request->owner;
        $owner = explode(';', $owner);
        $model = app($owner[0])->find($owner[1]);

        $baseProject = BaseProject::create($request->validated());

        $baseProject->owner()->associate($model);

        return redirect()->route('base-projects.show', $baseProject);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BaseProject  $baseProject
     * @return \Illuminate\Http\Response
     */
    public function show(BaseProject $baseProject)
    {
        // redirect to branch index
        return redirect()->route('base-projects.branches.index', $baseProject);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BaseProject  $baseProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BaseProject $baseProject)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $baseProject->title = $request->title;
        $baseProject->save();

        return redirect()->route('base-projects.settings', $baseProject)
            ->with('success','Successfully renamed project');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BaseProject  $baseProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(BaseProject $baseProject)
    {
        //
    }

    public function settings(BaseProject $baseProject)
    {
        $users = User::all();

        return view('base-projects.settings', compact(['baseProject','users']));
    }
}
