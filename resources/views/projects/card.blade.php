
<div class="card" style="height:200px">
    {{-- Title --}}
    @if (isset($titleIsLink) == true)
        <h4 class="text-lg mb-4">
            <a href="{{ $project->privatePath()}}" class="no-underline text-grey-dark hover:text-black">{{$project->title}}</a>
        </h4>
    @else
        <h3 class="no-underline text-grey-darkest">{{$project->title}}</h3>
    @endif



    {{-- Description --}}
    <div class="text-base mb-4 text-grey-darker">{{str_limit($project->description, 100)}}</div>

    @if (isset($displayButtons) == true)
    <div class="flex items-center pin-b absolute mb-4 justify-between w-full pr-8"> {{-- Buttons --}}
            <a class="btn btn-blue" href="">Edit</a>
            <a class="btn btn-green" href="{{ $project->publicPath()}}">Overview</a>
            <a class="btn btn-red" href="">Delete</a>
    </div>
    @endif
</div>