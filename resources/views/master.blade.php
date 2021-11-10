<!DOCTYPE html>
<html lang="en">
<head> 
   
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>@yield('title')</title>

<!-- Fonts -->

<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<script src="{{ mix('js/app.js') }}" defer></script>
<!-- Styles -->
{{-- <style>
/*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}}
</style> --}}

</head>

<body class="bg-black">   
    <a name="top"></a>   

    <div id="navimage">
    </div>        
    
    <div class="hidden md:flex items-center space-x-1" id="menu">
        <nav sail down>           
        

            <ul class="flex" id="menu"> 

                <a class="place-self-center" href="/welcome">
                    <div class="logo-image">
                        <img src="/images/logored.png" width="250px" class="img-fluid">
                    </div>
                </a>                
                
                <li class="flex"><a class="place-self-center" href="/welcome">Home</a></li>
                @auth
                <li class="flex" ><a class="place-self-center" href="/subs">Submit</a></li>                
                <li class="flex"><a class="place-self-center" href="/editor">Editor</a></li> 
                @endauth 
                <li class="flex"><a class="place-self-center" href="/contact">Contact</a></li>  
                    
                    @if (Route::has('login'))
                        @auth
                        {{-- <li>
                            <a href="{{ url('/') }}"></a>
                        </li> --}}
                    @else
                        
                    <li class="flex"><a class="place-self-center" href="/mdlogin">Login</a></li>
                        

                        @if (Route::has('register'))
                        <li class="flex">
                            <a class="place-self-center" href="/mdregister" id="register">Register</a>
                        </li>
                        @endif
                        @endauth                         
                    @endif               
                    
                        {{-- @hasrole('admin|editor|manager')
                        <a href="https://google.com/%22%3E Create a new Blogo  </a>
                        @endhasrole --}}
                @auth        
                <!-- Authentication -->
                <form class="p-0 m-0 flex-inline" id="logout" method="POST" action="{{ route('logout') }}">
                    <li class="flex">
                        @csrf
                        <a class="place-self-center" href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </li>
                </form>                                    
                @endauth 
                <li class="flex p-0 ml-9">  
                    <form class="place-self-center" id="search" action="{{ route('search') }}" method="GET">
                    
                        <input id="caret" type="text" name="search" required/>                    
                        <button id="searchbtn" type="submit">Search</button>
                                    
                    </form>
                </li>                                              
            </ul>    
            
        </nav> 
    </div>      

    {{-- dropdown --}}
    <div class="md:hidden flex items-center">
        <button class="outline-none mobile-menu-button">
            <svg
                class="w-8 h-8 text-gray-500"
                x-show="!showMenu"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
            <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <div class="hidden mobile-menu">
        <ul class="block">
            <a class="flex" id="mobMenuLi" href="/welcome"><li class="block text-base px-2 py-4 transition duration-300">Home</a></li>
            @auth
            <a class="flex" id="mobMenuLi" href="/subs" ><li class="block text-base px-2 py-4 transition duration-300">Submit</a></li>                
            <a class="flex" id="mobMenuLi" href="/editor"><li class="block text-base px-2 py-4 transition duration-300">Editor</a></li> 
            @endauth 
            <a class="flex" id="mobMenuLi" href="/contact"><li class="block text-base px-2 py-4 transition duration-300">Contact</a></li>  
                
                @if (Route::has('login'))
                    @auth
                    {{-- <li>
                        <a href="{{ url('/') }}"></a>
                    </li> --}}
                @else
                    
                <a class="flex" id="mobMenuLi" href="/mdlogin"><li class="block text-base px-2 py-4 transition duration-300">Login</a></li>
                    

                    @if (Route::has('register'))
                    <a class="block text-base px-2 py-4 transition duration-300" href="/mdregister">
                        <li class="place-self-center">Register</a>
                    </li>
                    @endif
                    @endauth                         
                @endif               
                
                    {{-- @hasrole('admin|editor|manager')
                    <a href="https://google.com/%22%3E Create a new Blogo  </a>
                    @endhasrole --}}
            @auth        
            <!-- Authentication -->
            <li class="block text-lg px-2 py-4 transition duration-300">
                <form method="POST" action="{{ route('logout') }}">
                    <a class="flex" id="mobMenuLi" href="route('logout')">
                        @csrf
                        <li class="place-self-center"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </li>
                </form> 
            </li>                                     
            @endauth
            <li class="block text-lg px-3 py-1 transition duration-300">  
                <form class="place-self-center" id="searchmob" action="{{ route('search') }}" method="GET">
                
                    <input id="caretmob" type="text" name="search" required/>                    
                    <button id="searchbtnmob" type="submit">Search</button>
                                
                </form>
            </li>              
        </ul>
    </div>
            
    <div class="flex">
        <div id="wrapper">       
            @yield('content')
        </div>        
    </div>        
   
       
    <div class="footer-basic">       
        <footer>
            
            <ul class="list-inline flex justify-between">
                <li class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></li>                     
                <li class="copyright">MagicMovies © 2018</li>
                <li class="topPage"><a href="#top">Back to top</a></li>             
            </ul>           
            
        </footer>             
    </div>

   
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        // Grab HTML Elements
        const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");

        // Add Event Listeners
        btn.addEventListener("click", () => {
	    menu.classList.toggle("hidden");
        });
    </script>
</body>
</html>
