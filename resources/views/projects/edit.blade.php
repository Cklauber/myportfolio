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

<form class="container" action="{{route('project.store')}}" method="post">
  @csrf

  <h1> Create a Project</h1>


  <div class="field">

      <label for="title" class="label">Title</label>

      <div class="control">

          <input class="input" name="title" type="text" placeholder="Title" value="{{$project->title}}">

      </div>

  </div>

  <div class="field">

      <label for="slug" class="label">Slug</label>

      <div class="control">

          <input class="input" name="slug" type="text" placeholder="Slug" value="{{$project->slug}}">

      </div>

  </div>



  <div class="field">

      <label for="description" class="label">Description</label>

      <div class="control">

          <textarea name="description" class="textarea">{{$project->description}}</textarea>

      </div>

  </div>

  <div class="field">

      <div class="control">

          <button type="submit" class="btn btn-green">Create</button>

          <a href="{{url()->previous()}}" class="btn btn-red">Cancel</a>
      </div>

  </div>




</form>
@endsection