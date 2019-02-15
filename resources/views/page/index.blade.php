@extends('layouts.admin.master')
@section('title')
  -  Projects
@endsection
@section('content')
    <h1>You can see your pages here</h1>
    <div>
        @forelse ($pages as $page)
            <div>
                <h3><a href="{{$page->privatePath()}}">{{$page->title}}</a></h3>
            </div>
        @empty
            <div>No pages yet.</div>
        @endforelse 
    </div>
@endsection