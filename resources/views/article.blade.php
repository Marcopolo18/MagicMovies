@extends('master')
{{-- @section('title', 'Message Details') --}}
@section('content')
<div>
<h2>{{$post->title}}</h2>
<p>{{$post->category}}</p>
<p>{{$post->author}}</p>
<p>{{$post->content}}</p>
</div>
@endsection