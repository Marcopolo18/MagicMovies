@extends('master')
@section('title', 'Message List')
@section('content')

<div class="py-12">
    <h2>Create new post: </h2>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-gray-300 border-b border-gray-200">
                You're logged in!
                <form action="/newpost" method="post" enctype="multipart/form-data">
                    <input class="inputs" type="text" name="category" placeholder="Category" autocomplete="off">
                    <input class="inputs" type="text" name="title" placeholder="Title" autocomplete="off"><br>
                    <input class="inputs" type="text" name="author" placeholder="Author" autocomplete="off">
                    <input class="inputs" type="text" name="content" placeholder="Content" autocomplete="off"><br>
                    <input class="inputs" type="file" name="file_path" placeholder="Image" autocomplete="off"><br>

                    @csrf
                    <button id="newpost" class="inline-flex disabled items-center px-4 py-2 mx-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="py-12">
    <h2>View/delete posts: </h2>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-gray-300 border-b border-gray-200">
                <div id="showposts">
                    <ul>
                        
                        @foreach ($posts as $post)                    
                    
                            <li class="{{ $post->category }} posted">
                                <b><h2><a href="/article/{{$post->id}}">{{$post->title}}</a></h2></b>
                                {{$post->file_path}}<br> 
                                created by: {{$post->author}}<br>
                                {{$post->content}}<br>
                                {{$post->created_at->diffForHumans()}}<br>
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

                    {{-- <ul>
                        @foreach ($posts as $post)
                        <li><b><a href="/article/{{$post->id}}">{{$post->title}}:</a></b></li>
                        <li>
                            {{$post->file_path}}<br>                        
                            {{$post->category}}<br>
                            {{$post->author}}<br>
                            {{$post->content}}<br>                        
                            {{$post->created_at->diffForHumans()}}
                        </li>
                        <li>
                            <form action="/post/{{$post->id}}" method="post">
                            @csrf
                            @method('delete')
                            <button id="showpost" class="inline-flex disabled items-center px-4 py-2 mx-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" type="submit">Delete</button>
                            </form>
                        </li>
                        @endforeach
                    </ul> --}}
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="py-12">
    <h2>Review/delete subs: </h2>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-gray-300 border-b border-gray-200">
                <div id="showSubs">
                    <ul>
                        @foreach ($subs as $sub)
                        <li><b>{{$sub->title}}:</b></li>
                        <li>
                            {{$sub->file_path}}<br>                        
                            {{$sub->category}}<br>
                            {{$sub->author}}<br>
                            {{$sub->content}}<br>                        
                            {{$sub->created_at->diffForHumans()}}
                        </li>
                        <li>
                            <form action="/subs/{{$sub->id}}" method="post">
                            @csrf
                            @method('delete')
                            <button id="showsubs" class="inline-flex disabled items-center px-4 py-2 mx-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" type="submit">Delete</button>
                            </form>
                        </li>
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

    if (countFields =< 4) {                 // If counter reaches 4 display button
        newpost.style.display = "block"
    } else {                                // If counter is NOT 5 then button doesnt appear
        newpost.style.display = "none"
    }

}


</script>


@endsection
