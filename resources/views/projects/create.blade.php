@extends('layouts.admin.master')
@section('title')
    - New Project
@endsection
@section('content')  
<header class="flex py-5">{{-- Header --}}
    <div class="flex items-end mx-auto justify-between w-full">

        <h1 class="text-base text-grey-dark">
            <a href="{{route('admin.project.index')}}" class="text-grey-dark no-underline hover:text-grey active:text-grey-light">My Projects
            </a>  
            / New Project
        </h1>
        <a class="btn btn-grey" href="{{route('admin.project.index')}}">My Projects</a>

    </div>       
</header>      
        <form class="container" action="{{route('project.store')}}" method="post">
        @csrf

        <h1> Create a Project</h1>


            <div class="field">
            
                <label for="title" class="label">Title</label>
                
                <div class="control">
                
                    <input class="input" name="title" type="text" placeholder="Title">
                
                </div>
            
            </div>

            <div class="field">
            
                <label for="slug" class="label">Slug</label>
            
                <div class="control">
            
                    <input class="input" name="slug" type="text" placeholder="Slug">
            
                </div>
            
            </div>
            


            <div class="field">
            
                <label for="description" class="label">Description</label>
            
                <div class="control">
            
                    <textarea name="description" class="textarea"></textarea>
            
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