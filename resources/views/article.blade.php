@extends('master')

@section('content')

<div class="max-w-7xlmx-auto sm:px-6 lg:px-8">
    <div class="bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="place-self-center bg-gray-300 border-b border-gray-200">            
            <div id="soloArt">
                <ul>
                    <li class="{{ $article->category }} color-gray-900 posted"> 
                    {{-- attempt image md                               --}}
                        <div class="blogPic">
                            <img src="/images/{{ $article->img_filename }}" class="w-100">                                
                        </div>

                        <div class="postText">
                            <b><u><h3>{{$article->title}}</h3></u></b>                       
                            <b>Created {{$article->created_at->diffForHumans()}}
                            by {{$article->author}}</b><br><br>
                            {{$article->content}}<br><br>
                            <b>Category: {{$article->category}}</b><br>
                        </div><br><br><hr>

                        <div class="flex-inline" id="comms"> 
                            <h4>Comments:</h4>                           
                            @comments ([
                                'model' => $article,
                                'approved' => true,                                
                                'perPage' => 5
                            ])
                        </div>
                        

                    @auth
                    {{-- <li> --}}
                        <form action="/post/{{$article->id}}" method="post">
                        @csrf
                        @method('delete')
                        <button id="showpost" class="inline-flex disabled items-center px-4 py-2 mx-5 bg-gray-800 font-semibold text-xs uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" type="submit">Delete</button>
                        </form>
                    </li>
                    @endauth 
                    
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

