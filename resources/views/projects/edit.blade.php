@extends('layouts.admin.master') 
@section('title') - Edit {{$project->title}}
@endsection
 
@section('content')
<header class="flex py-5">{{-- Header --}}
  <div class="flex items-end mx-auto justify-between w-full">
    <h1 class="text-grey-dark text-base">My Projects / {{$project->title}} / Edit</h1>
    <a class="btn btn-blue" href="{{route('project.create')}}">New project</a>
  </div>
</header>

<div class="bg-white w-1/2 p-6 mx-auto card">
    <form class="container mx-auto text-center text-grey-darker" action="{{ $project->privatePath() }}" method="post">
        @method('patch')
        <h1>Editing Project: {{$project->title}}</h1>
        @include('projects._form', ['buttonName' => 'Salvar'])

        
    </form>
</div>
@endsection