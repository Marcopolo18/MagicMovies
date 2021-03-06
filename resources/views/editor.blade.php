@extends('master')
@section('content')


<div class="py-12">
    <h2 class="text-4x1">Create new post: </h2>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-gray-300 border-b border-gray-200">
                {{-- You're logged in! --}}
                <form action="/newpost" method="post" enctype="multipart/form-data">               

                    <input class="inputs" type="text" name="category" placeholder="Category" autocomplete="off">
                    <input class="inputs" type="text" name="title" placeholder="Title" autocomplete="off"><br>
                    <input class="inputs" type="text" name="author" placeholder="Author" autocomplete="off">
                    <input class="inputs" type="text" name="content" placeholder="Content" autocomplete="off"><br>
                    <input class="inputs w-11/12 sm:w-11/12 lg:w-100% xl: w-100%" type="file" name="image" placeholder="Image" autocomplete="off"><br>

                    @csrf
                    <button id="newpost" class="inline-flex disabled items-center px-4 py-2 mx-1 bg-gray-800 font-semibold text-xs uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>    
</div>

<div class="py-12">
    <h2 class="text-4x1">View/delete posts: </h2>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-gray-300 border-b border-gray-200">
                <div id="showposts">
                    <ul>
                        {{-- added where merge md --}}
                        @foreach ($articles->where('approved', '1') as $article)                   
                    
                            <li class="{{ $article->category }} posted">
                            
                            <div class="blogPic">
                                <img src="/images/{{ $article->img_filename }}" class="w-80">                                
                            </div>
                            <div class="postText">
                                <b><h3><a id="link" href="/article/{{$article->id}}">{{$article->title}}</a></h3></b>
                                <b>Created {{$article->created_at->diffForHumans()}}
                                by {{$article->author}}</b><br><br>
                                {{Str::limit($article->content, 100)}}<br><br>
                                <b>Category: {{$article->category}}</b><br>
                            </div>
                        @role('editor')
                            <form action="/post/{{$article->id}}" method="post">
                            @csrf
                            @method('delete')
                            <button id="showpost" class="inline-flex disabled items-center px-4 py-2 mx-5 bg-gray-800 font-semibold text-xs uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" type="submit">Delete</button>
                            </form>
                        </li>
                        @endrole                        
                        @endforeach
                    </ul>

                </div>
                
            </div>
        </div>
    </div>
</div>



<div class="py-12">
    <h2 class="text-4x1">Review submissions: </h2>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-gray-300 border-b border-gray-200">
                <div class="flex" id="showSubs">
                    <ul>
                        {{-- added where merge md --}}
                        @foreach ($articles->where('approved', '0') as $article)                    
                    
                            <li class="{{ $article->category }} posted">
                            
                            <div class="blogPic">
                                <img src="/images/{{ $article->img_filename }}" class="w-40">                                
                            </div>
                            <div class="postText">
                                <b><h3><a id="link" href="/article/{{$article->id}}">{{$article->title}}</a></h3></b>
                                <b>Created {{$article->created_at->diffForHumans()}}
                                by {{$article->author}}</b><br><br>
                                {{$article->content}}<br><br>
                                <b>Category: {{$article->category}}</b><br>
                            </div>
                        @auth
                            <div class="flex">
                                <form action="/post/{{$article->id}}" method="post">
                                @csrf
                                @method('delete')
                                <button id="showsubs" class="inline-flex disabled items-center px-4 py-2 mx-5 bg-gray-800 font-semibold text-xs uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" type="submit">Delete</button>
                                </form>

                                <form action="/approve/{{$article->id}}" method="post">
                                    @csrf
                                    @method('post')
                                    <button id="showsubs" class="inline-flex disabled items-center px-4 py-2 mx-5 bg-gray-800 font-semibold text-xs uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" type="submit">Approve</button>
                                </form>
                            </div>
                        </li>
                        @endauth                        
                        @endforeach
                    </ul>

                </div>                
            </div>
        </div>
    </div>
</div>


<script>

let newpost = document.getElementById ("newpost") // Stores the "create" element in a Variable Create (Button)

let inputs = document.querySelectorAll (".inputs") // This function stores all input "Class" in a Array or (Variable)


inputs.forEach(input => {
    input.addEventListener('keyup', checkFields)    // Takes each entry from the inputs Array and applies the EventListener function and then executes on keyup checkFields
});


function checkFields () {
    //console.log("blabla")        // This counter has the value of 0
    let countFields = 0

    inputs.forEach(input => {
        //console.log(input.value)  // If the field is NOT empty, then adds a 1 to the counter
        if (input.value != "") {
            countFields++
        }
    });

    if (countFields == 4) {                 // If counter reaches 4 display button
        newpost.style.display = "block"
    } else {                                // If counter is NOT 5 then button doesnt appear
        newpost.style.display = "none"
    }

}

</script>


@endsection
