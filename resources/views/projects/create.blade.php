@extends('layouts.admin.master')
@section('title')
    - New Project
@endsection
@section('content')        
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

                    <button type="submit" class="button is-link">Create Project</button>

                    <a href="{{url()->previous()}}">Cancel</a>
                </div>

            </div>


        

        </form>   
@endsection