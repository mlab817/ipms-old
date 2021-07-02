<?php

namespace App\Http\Controllers;

use App\Http\Requests\PipolCreateRequest;
use App\Http\Requests\PipolUpdateRequest;
use App\Models\Pipol;
use App\Models\Project;
use Illuminate\Http\Request;


class PipolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pipolsQuery = Pipol::query();
        $search = $request->query('search');

        if ($search) {
            $pipols = $pipolsQuery->where('project_title','like','%'.$search.'%')->paginate();
        } else {
            $pipols = $pipolsQuery->paginate();
        }

        return view('pipol.index', compact('pipols'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pipol.create')
            ->with(['submission_statuses' => Pipol::SUBMISSION_STATUS])
            ->with(['categories' => Pipol::CATEGORIES])
            ->with(['projects' => Project::select('id','title')->orderBy('title','ASC')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PipolCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PipolCreateRequest $request)
    {
        $pipol = Pipol::create($request->validated());

        $pipol->user()->associate(auth()->user());

        Alert::success('Success','Successfully added PIPOL entry');

        return redirect()->route('pipols.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pipol  $pipol
     * @return \Illuminate\Http\Response
     */
    public function show(Pipol $pipol)
    {
        return view('pipol.show', compact('pipol'))
            ->with('project', $pipol->project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pipol  $pipol
     * @return \Illuminate\Http\Response
     */
    public function edit(Pipol $pipol)
    {
        return view('pipol.edit', compact('pipol'))
            ->with(['submission_statuses' => Pipol::SUBMISSION_STATUS])
            ->with(['categories' => Pipol::CATEGORIES])
            ->with(['projects' => Project::select('id','title')->orderBy('title','ASC')->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pipol  $pipol
     * @return \Illuminate\Http\Response
     */
    public function update(PipolUpdateRequest $request, Pipol $pipol)
    {
        $pipol->update($request->validated());

        $pipol->user()->associate(auth()->user());

        Alert::success('Success','Successfully updated PIPOL entry');

        return redirect()->route('pipols.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pipol  $pipol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pipol $pipol)
    {
        //
    }
}
