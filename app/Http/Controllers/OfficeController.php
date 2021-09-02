<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $office = auth()->user()->office;

        return view('offices.overview', compact('office'))
            ->with('projects', $office->projects);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        return view('offices.overview', compact('office'))
            ->with('projects', $office->projects);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        $validator = Validator::make($request->only('logo'), [
            'logo' => 'required|image|file|max:2048',
        ],[
            'logo.required' => 'The logo file is required.',
            'logo.image' => 'The logo file must be an image.',
            'logo.max' => 'The logo file must be less than 2 MB'
        ]);

        if ($validator->fails()) {
            return back()
                ->with('error', $validator->errors()->first());
        }

        $uploadedFile = Storage::disk('public')->putFile('logos', $request->logo);

        $office->logo = $uploadedFile;
        $office->save();

        return back();
    }

    public function projects(Request $request, Office $office)
    {
        $projects = $office->owned_projects()->simplePaginate(10);

        return view('offices.projects', compact('projects'))
            ->with('office', $office);
    }

    public function users(Request $request, Office $office)
    {
        $users = $office->users;

        return view('offices.users', compact('users'))
            ->with('office', $office);
    }
}
