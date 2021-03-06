@extends('master')
@section('content')

 
<div class="max-w-7xlmx-auto sm:px-6 lg:px-8">
    <div class="bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="place-self-center bg-gray-300 border-b border-gray-200"> 
            <div class="flex flex-wrap flex-col sm:flex-col md:flex-col lg:flex-row xl:flex-row w-100% justify-around" id="recom">
                <div class="" id="recomRow">                     
                    <iframe src="https://www.youtube.com/embed/BIhNsAtPbPI" title="YouTube video player" 
                        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; 
                        gyroscope; picture-in-picture" allowfullscreen>
                    </iframe><br>
                    <p id="recomTit"><strong>New film trailer</strong></p>
                    <p id="recomText">But I must explain to you  how all this mistaken idea
                        of denouncing pleasure and praising pain was born and I will give
                        you a  complete account of the system, and expound the actual teachings.
                    </p>
                </div>
                <div class="" id="recomRow"> 
                    <iframe src="https://www.youtube.com/embed/0ke-v0e3Cd4" title="YouTube video player" 
                        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; 
                        gyroscope; picture-in-picture" allowfullscreen>
                    </iframe><br>
                    <p id="recomTit"><strong>Film recommendation</strong></p>
                    <p id="recomText">Nor again is there anyone who loves or pursues or desires
                        to obtain pain of itself, because it is pain, but because occasionally 
                        circumstances occur in which toil and paincan procure him some great pleasure. </p> 
                </div>
                <div class="" id="recomRow"> 
                    <iframe src="https://www.youtube.com/embed/sS6ksY8xWCY" title="YouTube video player" 
                        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; 
                        gyroscope; picture-in-picture" allowfullscreen>
                    </iframe><br>
                    <p id="recomTit"><strong>Film condemnation</strong></p>
                    <p id="recomText">The European languages are members of the same family. 
                        Their separate existence is a myth. For science, music, sport, etc,
                        Europe uses the same vocabulary. The languages only differ in their grammar,
                        their pronunciation and their most common words.</p>  
                </div>                               
            </div> 
            
            <div class="flex flex-wrap" id="showposts">                                           
                @foreach ($articles->where('approved', '1') as $article) 
                    @if($loop->first)                                 
                        <div class="{{ $article->category }} posted w-screen sm:md:p-2 md:p-2 l:p-4 xl:p-4"> 
                            <div class="blogPic">
                                <img src="/images/{{ $article->img_filename }}">                                
                            </div>

                            <div class="postText">
                                <b><h3><a id="link" href="/article/{{$article->id}}">{{$article->title}}</a></h3></b>             
                                <b>Created {{$article->created_at->diffForHumans()}}
                                by {{$article->author}}</b><br><br>
                                {{Str::limit($article->content, 200)}}<br><br>
                                <b>Category: {{$article->category}}</b><br>
                            </div>
                            
                            @role('editor')                    
                            <form action="/post/{{$article->id}}" method="post">
                            @csrf
                            @method('delete')
                            <button id="showpost" class="inline-flex disabled items-center px-4 py-2 mx-5 bg-gray-800 font-semibold text-xs uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" type="submit">Delete</button>
                            </form>                    
                            @endrole 
                        </div>
                    @else
                        @if($loop->index == 1)
                            <div class="flex flex-col sm:flex-col md:flex-col lg:flex-row xl:flex-row"> <!--start of row-->
                        @elseif(($loop->index - 1) % 3 == 0) 
                            </div> <!-- closing row tag-->
                            <div class="flex flex-col sm:flex-col md:flex-col lg:flex-row xl:flex-row"> <!--start of row-->                                        
                        @endif

                        
                        <div class="block sm:3/3 md:3/3 lg:w-1/3 xl:1/3 pt-4 m-2" id="postBox">
                            <div class="blogPic">
                                <img src="/images/{{ $article->img_filename }}">                                
                            </div>
                            <div class="postText">
                                <b><h3><a id="link" href="/article/{{$article->id}}">{{$article->title}}</a></h3></b>             
                                <b>Created {{$article->created_at->diffForHumans()}}
                                by {{$article->author}}</b><br><br>
                                {{Str::limit($article->content, 200)}}<br><br>
                                <b>Category: {{$article->category}}</b><br>
                            </div>
    
                            @role('editor')                            
                            <form action="/post/{{$article->id}}" method="post">
                            @csrf
                            @method('delete')
                            <button id="showpost" class="inline-flex disabled items-center px-2 py-2 bg-gray-800 font-semibold text-xs uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" type="submit">Delete</button>
                            </form>
                            @endrole 
                        </div>
                       
                    @endif

                    @if($loop->last && $loop->count > 1)
                        </div> <!-- closing row tag-->
                    @endif
                @endforeach
            </div>                       
            <div class="">{{ $articles->links() }}</div>            
        </div>
    </div>
</div>
{{-- </div> --}}
@endsection