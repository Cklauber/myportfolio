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
        @csrf
        <h1>Let's Create Something New</h1>


        <div class="text-left m-4">

            <label class="mb-2 block" for="title">Title<font class="text-red">*</font> </label>

            <div class="control">

                <input class="input text-2x1 px-3 py-2 border rounded border-grey-dark h-12 w-64 w-full" name="title" type="text" placeholder="Your awesome project">

            </div>

        </div>

        <div class="text-left m-4">

            <label class="mb-2 block" for="slug">Slug</label>

            <div class="control">

                <input class="input text-2x1 px-3 py-2 border rounded border-grey-dark h-12 w-64 w-full" name="slug" type="text" placeholder="your-awesome-project">

            </div>

        </div>

        <div class="text-left m-4">

            <label class="mb-2 block" for="is_public">Type of Project<font class="text-red">*</font></label>

            <div class="control">

                <input type="radio" name="is_public" value="1" checked="checked">Public <br>
                <input type="radio" name="is_public" value="0">Private

            </div>

        </div>

        <div class="text-left m-4">

            <label class="mb-2 block" for="repository">Repository</label>

            <div class="control">

                <input class="input text-2x1 px-3 py-2 border rounded border-grey-dark h-12 w-64 w-full" name="repository" type="text" placeholder="github.com/awesomeProject">

            </div>

        </div>

        <div class="text-left m-4">

            <label class="mb-2 block" for="is_public_repository">Type of repository<font class="text-red">*</font></label>

            <div class="control">

                <input 
                type="radio" 
                name="is_public_repository" 
                value="1" 
                checked="checked">Public <br>
                <input type="radio" name="is_public_repository" value="0">Private

            </div>

        </div>


        <div class="text-left m-4">

            <label for="slug" class="mb-2 block" for="description">Description<font class="text-red">*</font></label>

            <div class="control">

                <textarea name="description" class="textarea text-2x1 px-3 py-2 border rounded border-grey-dark h-12 w-64 w-full" placeholder="This is gonna be the most famous app ever!"
                    required></textarea>

            </div>

        </div>

        <div class="field">

            <div class="control">

                <button type="submit" class="btn btn-green">Create</button>

                <a href="{{url()->previous()}}" class="btn btn-red">Cancel</a>
            </div>

        </div>
    </form>
    @if ($errors->any())
    <div class="field mt-6">
        @foreach ($errors->all() as $error)
            <li class="text-sm text-red">{{ $error }}</li>
        @endforeach
    </div>
@endif
</div>
@endsection