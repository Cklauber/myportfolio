@extends('layouts.admin.master') 
@section('title') - New Project
@endsection
 
@section('content')
<header class="flex py-5">{{-- Header --}}
    <div class="flex items-end mx-auto justify-between w-full">

        <h1 class="text-base text-grey-dark">
            <a href="{{route('admin.project.index')}}" class="text-grey-dark no-underline hover:text-grey active:text-grey-light">My Projects
            </a> / New Project
        </h1>
        <a class="btn btn-grey" href="{{route('admin.project.index')}}">My Projects</a>

    </div>
</header>
<div class="bg-white w-1/2 p-6 mx-auto card">
    <form class="container mx-auto text-center text-grey-darker" action="{{route('project.store')}}" method="post">
        <h1>Let's Start Something New</h1>
        
        @include('projects._form', [
            'project' => new App\Project,
            'buttonName' => 'Create'
            ])
    </form>
</div>
@endsection