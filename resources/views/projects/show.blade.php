@extends('layouts.admin.master')
@section('title')
 - Project - {{ $project->title }}
@endsection
@section('content')

        <h1 class="title is-4">{{ $project->title }}</h1>

        <div>

            <p class="is-4">{{$project->description }}</p>

        </div>
        <div>

            <a href="{{url()->previous()}}">Back</a>

        </div>
    </body>
</html>
@endsection