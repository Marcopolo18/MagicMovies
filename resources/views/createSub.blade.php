@extends('master')
@section('content')

<div class="py-12">
    <h2 class="flex text-4x1">Create a post. We will review it, in order to ascertain that it meets our standards: </h2>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-gray-300 border-b border-gray-200">
                {{-- You're logged in! --}}
                <form action="/newsub" method="post" enctype="multipart/form-data">
                    <input class="inputs" type="text" name="category" placeholder="Category" autocomplete="off">
                    <input class="inputs" type="text" name="title" placeholder="Title" autocomplete="off"><br>
                    <input class="inputs" type="text" name="author" placeholder="Author" autocomplete="off">
                    <input class="inputs" type="text" name="content" placeholder="Content" autocomplete="off"><br>
                    <input class="inputs w-11/12 sm:w-11/12 lg:w-100% xl: w-100%" type="file" name="image" placeholder="Image" autocomplete="off"><br>
                    
                    @csrf
                    <button id="newsub" class="inline-flex disabled items-center px-4 py-2 mx-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    let newsub = document.getElementById ("newsub") // Stores the "create" element in a Variable Create (Button)
    let inputs = document.querySelectorAll (".inputs") // This function stores all input "Class" in a Array or (Variable)
    console.log(inputs);
    
    
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
            newsub.style.display = "block"
        } else {                                // If counter is NOT 5 then button doesnt appear
            newsub.style.display = "none"
        }
    
    }
    
    
    </script>
    
@endsection