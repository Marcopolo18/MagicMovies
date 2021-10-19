@extends('master')

@section('content')
<h2>Create new post: </h2>



<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                You're logged in!
                <form action="/create" method="post">
                    <input class="inputs" type="text" name="category" placeholder="Category" autocomplete="off">
                    <input class="inputs" type="text" name="title" placeholder="Title" autocomplete="off"><br>
                    <input class="inputs" type="text" name="author" placeholder="Author" autocomplete="off">
                    <input class="inputs" type="text" name="content" placeholder="Content" autocomplete="off"><br>
                    @csrf
                    <button id="create" class="inline-flex disabled items-center px-4 py-2 mx-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>

let create = document.getElementById ("create") // Stores the "create" element in a Variable Create (Button)

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

    if (countFields == 4) {                 // If counter reaches 5 display button
        create.style.display = "block"
    } else {                                // If counter is NOT 5 then button doesnt appear
        create.style.display = "none"
    }

}


</script>


@endsection
