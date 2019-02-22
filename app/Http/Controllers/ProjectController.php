<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProjectController extends Controller
{
    public function public()
    {
    }

    public function publicNonAdmin($username, $project)
    {
        $project = User::where('username', $username)->firstOrFail()
        ->projects->where('slug', $project)->first();

        if (isset($project)) {
            if ($project->is_public == true) {
                return view('public.project');
            }
            return abort(403);
        }
        return abort(404);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index', compact(['projects']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'slug' => 'nullable',
            'stack' => 'nullable',
            'status' => 'nullable',
            'is_public' => 'required',
            'repository' => 'nullable',
            'is_public_repository' => 'required'
        ]);
        
        if (request('slug') == '') {
            $attributes['slug'] = str_slug(request('title'));
        }
        //Persist
        Auth::user()->projects()->create($attributes);

        //Redirect
        return redirect(route('admin.project.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        if (auth()->user()->isNot($project->owner)) {
            return abort(403);
        }
        
        return view('projects.show', compact(['project']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        if (auth()->user()->isNot($project->owner)) {
            return abort(403);
        }
        
        return view('projects.edit', compact(['project']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //Validate
        $attributes = request()->validate([
        'title' => 'required',
        'description' => 'required',
        'slug' => 'nullable',
        'stack' => 'nullable',
        'status' => 'nullable',
        'is_public' => 'required',
        'repository' => 'nullable',
        'is_public_repository' => 'required'
    ]);

        if (request('slug') == '') {
            $attributes['slug'] = str_slug(request('title'));
        }
        //Persist
        $project->update($attributes);

        //Redirect
        return redirect(route('admin.project.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
