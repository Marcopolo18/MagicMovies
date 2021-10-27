@extends('master')
@section('content')

@if($results->isNotEmpty())
@foreach ($results as $result)
<li class="{{ $result->category }} posted">     
    <div class="blogPic">
        <img src="/images/{{ $result->file_path }}" class="w-100">                                
    </div>
    <b><h2>{{$result->title}}</h2></b>                               
    
    created by: {{$result->author}}<br>
    {{$result->created_at->diffForHumans()}}<br>
    {{$result->content}}<br>
    @endforeach
    @else 
    <div>
        <h2>No posts found</h2>
    </div>
@endif

@endsection