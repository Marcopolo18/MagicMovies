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
<!-- Styles -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<script src="{{ mix('js/app.js') }}" defer></script>


</head>

<body class="bg-black">   
    <a name="top"></a>   

    <div id="navimage">
    </div>        
    
    <div class="hidden md:flex items-center space-x-1" id="menu">
        <nav sail down>           
        

            <ul class="flex" id="menu"> 


                    <div class="logo-image">
                        <a class="place-self-center" href="/welcome">
                            <img src="/images/logored.png" width="250px" class="img-fluid">
                        </a> 
                    </div>
                              
                
                <li class="flex"><a class="place-self-center" href="/welcome">Home</a></li>
                @hasanyrole('user|editor')
                <li class="flex" ><a class="place-self-center" href="/createSub">Submit</a></li>                
                @endrole
                @role('editor')
                <li class="flex"><a class="place-self-center" href="/editor">Editor</a></li> 
                @endrole
                <li class="flex"><a class="place-self-center" href="/contact">Contact</a></li>  
                    
                    @if (Route::has('login'))
                        @auth
                        <li>
                            <a href="{{ url('/') }}"></a>
                        </li>
                    @else
                        
                    <li class="flex"><a class="place-self-center" href="/mdlogin">Login</a></li>
                        

                        @if (Route::has('register'))
                        <li class="flex">
                            <a class="place-self-center" href="/mdregister" id="register">Register</a>
                        </li>
                        @endif
                        @endauth                         
                    @endif               
                    
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
                class="w-12 h-12 text-gray-500"
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
            <a class="flex" id="mobMenuLi" href="/createSub" ><li class="block text-base px-2 py-4 transition duration-300">Submit</a></li>                
            <a class="flex" id="mobMenuLi" href="/editor"><li class="block text-base px-2 py-4 transition duration-300">Editor</a></li> 
            @endauth 
            <a class="flex" id="mobMenuLi" href="/contact"><li class="block text-base px-2 py-4 transition duration-300">Contact</a></li>  
                
                @if (Route::has('login'))
                    @auth
                    <li>
                        <a href="{{ url('/') }}"></a>
                    </li>
                @else
                    
                <a class="flex" id="mobMenuLi" href="/mdlogin"><li class="block text-base px-2 py-4 transition duration-300">Login</a></li>
                    

                    @if (Route::has('register'))
                    <a class="flex" id="mobMenuLi" href="/mdregister">
                        <li class="block text-base px-2 py-4 transition duration-300">Register</a>
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

    <div id="banner">
        <a href="/mdregister">Join today to comment and contribute content.<br> 
        <strong>REGISTER NOW!</strong></a>
    </div>    
            
    <div class="flex">
        <div id="wrapper">       
            @yield('content')
        </div>        
    </div>        
   
       
    <div class="footer-basic">       
        <footer>
            
            <ul class="list-inline flex justify-between">
                <li class="social place-self-center"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></li>                     
                <li class="copyright place-self-center">MagicMovies© 2018</li>
                <li class="topPage place-self-center"><a href="#top">Back to top</a></li>             
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
