@extends('layouts.admin.master')
@section('title')
  -  Projects
@endsection
@section('content')
<header class="flex py-5">{{-- Header --}}
    <div class="flex items-end mx-auto justify-between w-full">
            <h1 class="text-grey-dark text-base">My Projects</h1>
            <a class="btn btn-blue" href="{{route('project.create')}}">New project</a>
        </div>
    
</header>

    <div class="lg:flex lg:flex-wrap -mx-4">
        @forelse ($projects as $project)
            {{-- card area --}}
            <div class="lg:w-1/3 md:w-1/2 px-4 pb-6">

                    @include('projects.card', ['displayButtons' => true, 'titleIsLink' => true])


            </div>
        @empty
            <div>No projects yet</div>
        @endforelse
    </div>
@endsection