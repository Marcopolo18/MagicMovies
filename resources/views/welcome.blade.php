@extends('master')
@section('content')

<div class="py-12">
    <h2>View posts: </h2>
    <div class="max-w-7xlmx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-gray-300 border-b border-gray-200">
                <div id="showposts">
                    <ul>
                        
                        @foreach ($articles as $article)                    
                    
                            <li class="{{ $article->category }} posted"> 
                                
                                <div class="blogPic">
                                    <img src="/images/{{ $article->file_path }}" class="w-50 h-50">                                
                                </div>
                                <b><h2><a href="/article/{{$article->id}}">{{$article->title}}</a></h2></b>             
                                created by: {{$article->author}}<br>
                                {{$article->created_at->diffForHumans()}}<br>
                                {{$article->content}}<br>
                                
                        @auth
                       
                            <form action="/post/{{$article->id}}" method="post">
                            @csrf
                            @method('delete')
                            <button id="showpost" class="inline-flex disabled items-center px-4 py-2 mx-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" type="submit">Delete</button>
                            </form>
                       
                        @endauth                        
                        @endforeach
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</div>



@endsection