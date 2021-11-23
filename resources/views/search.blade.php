@extends('master')
@section('content')

<div class="max-w-7xlmx-auto sm:px-6 lg:px-8">
    <div class="bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="place-self-center bg-gray-300 border-b border-gray-200">            
            <div id="soloArt">
                @if($results->isNotEmpty())
                @foreach ($results as $result)
                <ul>
                    <li class="{{ $result->category }} color-gray-900 posted">     
                        <div class="blogPic">
                            <img src="/images/{{ $result->img_filename }}" class="w-100">                                
                        </div>
                        <div class="postText">
                            <b><h3>{{$result->title}}</h3></b>                        
                            <b>Created {{$result->created_at->diffForHumans()}}
                            by {{$result->author}}</b><br><br>
                            {{$result->content}}<br><br>
                            <b>Category: {{$result->category}}</b><br>
                        </div>
                    @endforeach
                    @else 
                        <div>
                            <h2>No posts found</h2>
                        </div>
                    @endif
                </ul>

                <div class="flex">
                    <a class="place-self-center" href="/welcome" id="backBtn">Home</a>
                    @auth
                    <a class="place-self-center" href="/editor" id="backBtn">Editor</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>


@endsection