@extends('layouts.admin.master')
@section('title')
 - Project - {{ $project->title }}
@endsection
@section('content')
<header class="flex py-5">{{-- Header --}}
        <div class="flex items-end mx-auto justify-between w-full">
    
            <h3 class="text-base text-grey-dark">
                <a href="{{route('admin.project.index')}}" class="text-grey-dark no-underline hover:text-grey active:text-grey-light">My Projects
                </a>  
                / {{ $project->title }}
            </h3>
            <a class="btn btn-blue" href="{{route('project.create')}}">New project</a>
    
        </div>       
</header>  {{-- End of Header --}} 

<div class="lg:flex -mx-3">

    <div class="w-3/4 px-3">

        <div class="mb-6">

            <h1 class="text-grey-dark font-normal text-lg mb-4">Tasks</h1>

                <div class="card mb-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsam possimus labore qui, natus ab delectus non. Neque iste dolor doloribus pariatur? Ipsa recusandae eos vitae nam maxime doloribus sint debitis!</div>

                <div class="card mb-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi dignissimos eius delectus veritatis? Nesciunt vero molestias quasi iure ipsum quia necessitatibus ea quo, labore eligendi sunt impedit culpa non accusantium!</div>

                <div class="card"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias perspiciatis quibusdam illum nisi, dicta et quidem itaque placeat, molestias dolore consequatur dolor. Laboriosam, labore sapiente ipsam incidunt debitis tempora deleniti?</div>

        </div>

        <div>

            <h1 class="text-grey-dark font-normal text-lg mb-3">General Notes</h1>

                    <textarea class="w-full h-32 card"></textarea>

        </div>
    </div>
    <div class="w-1/4 px-3">
        @include('projects.card')
    </div>
</div>

@endsection