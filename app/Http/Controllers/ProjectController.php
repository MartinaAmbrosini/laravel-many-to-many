<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProjectRequest;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('pages.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('pages.project.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $image = $data['image'];
        $image_path = Storage::disk('public')->put('images', $image);
        $type = Type::find($data['type_id']);

        $newProject = new Project();

        $newProject->name = $data['name'];
        $newProject->description = $data['description'];
        $newProject->image = $image_path;
        // $newProject->status = $data['status'];
        // $newProject->start_date = $data['start_date'];
        // $newProject->end_date = $data['end_date'];

        $newProject->type()->associate($type);

        $newProject->save();

        $newProject->technologies()->attach($data['technology_id']);

        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);

        return view('pages.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Type::all();
        $technologies = Technology::all();

        $project = Project::find($id);

        return view('pages.project.edit', compact('types', 'technologies', 'project'));
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
        $data = $request->all();

        $type = Type::find($data['type_id']);

        $project = Project::find($id);
        $project->name = $data['name'];
        $project->description = $data['description'];

        $project->type()->associate($type);

        $project->save();

        $project->technologies()->sync($data['technology_id']);

        return redirect()->route('project.index');
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
