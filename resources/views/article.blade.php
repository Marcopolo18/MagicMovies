@extends('master')

@section('content')

<li class="{{ $article->category }} posted"> 
    {{-- attempt image md                               --}}
    <div class="blogPic">
        <img src="/images/{{ $article->file_path }}" class="w-100">                                
    </div>
    <b><h2>{{$article->title}}</h2></b>                               
    
    created by: {{$article->author}}<br>
    {{$article->created_at->diffForHumans()}}<br>
    {{$article->content}}<br>

    @auth
    {{-- <li> --}}
        <form action="/post/{{$article->id}}" method="post">
        @csrf
        @method('delete')
        <button id="showpost" class="inline-flex disabled items-center px-4 py-2 mx-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" type="submit">Delete</button>
        </form>
    </li>
    @endauth 
    
   

@endsection

