@extends('master')
@section('content')

<div class="py-12">
    <h2>View posts: </h2>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-300 overflow-hidden shadow-sm sm:rounded-none">
            <div class="p-6 bg-gray-300 border-b border-gray-200">
                <div id="showposts">
                    <ul>
                        
                        @foreach ($posts as $post)                    
                    
                            <li class="{{ $post->category }} posted">
                                <b><h2><a href="/article/{{$post->id}}">{{$post->title}}</a></h2></b>
                                {{$post->file_path}}<br> 
                                created by: {{$post->author}}<br>
                                {{$post->created_at->diffForHumans()}}<br>
                                {{$post->content}}<br>
                                
                            {{-- </li><br> --}}
                        
                        
                        {{-- @foreach ($posts as $post)                       
                        <li><b><a href="/article/{{$post->id}}">{{$post->title}}:</a></b></li>
                        <li>
                            {{$post->file_path}}<br>                        
                            {{$post->category}}<br>
                            {{$post->author}}<br>
                            {{$post->content}}<br>                        
                            {{$post->created_at->diffForHumans()}}<br><br>
                        </li> --}}
                        @auth
                        {{-- <li> --}}
                            <form action="/post/{{$post->id}}" method="post">
                            @csrf
                            @method('delete')
                            <button id="showpost" class="inline-flex disabled items-center px-4 py-2 mx-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" type="submit">Delete</button>
                            </form>
                        </li>
                        @endauth                        
                        @endforeach
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</div>



@endsection