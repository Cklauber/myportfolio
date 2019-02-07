@extends('layouts.admin.master')
@section('title')
  -  Projects
@endsection
@section('content')
    <div class="flex items-center">
        <h1 class="title is-4 mr-auto mr-auto">Portfolio</h1>
        <a href="{{route('project.create')}}">New project</a>
    </div>
    <div>
        <ul>
            @forelse ($projects as $project)
                <li>
                    <h4>{{$project->title}}</h4>
                    <a href="{{ $project->privatePath()}}">Private</a>
                    <a href="{{ $project->publicPath()}}">Public</a>
                </li>
            @empty
                <li>No projects yet</li>
            @endforelse
        </ul>
    </div>
@endsection