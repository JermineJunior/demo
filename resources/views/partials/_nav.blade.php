<body class="bg-gray-100">
    <nav id="header" class="w-full z-30 top-0 py-1 bg-white shadow-lg border-b border-blue-400">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-2">
            
            <label for="menu-toggle" class="cursor-pointer md:hidden block">
                <svg class="fill-current text-blue-600" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                    <title>menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </label>
            <input class="hidden" type="checkbox" id="menu-toggle">
            
            <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
                <nav>
                    <ul class="md:flex items-center justify-between text-base text-blue-600 pt-4 md:pt-0">
                        <li class="inline-block no-underline hover:text-black font-medium text-lg px-4 lg:-ml-2">
                            <img src="{{ asset('images/logo.png') }}" alt="brand" class="w-10">
                        </li>
                        <li><a class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2" href="/">Home</a></li>
                        <li><a class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2" href="/posts">Posts</a></li>
                        <li><a class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2" href="#">About</a></li>
                        <li> <input type="search" name="" class="appearance-none  md:hidden rounded-lg mx-3 block w-1/2 bg-gray-300 text-gray-700 border border-gray-100 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Search ..."></li>
                    </ul>
                </nav>
            </div>
            
            <div class="order-2 md:order-3 flex items-center mr-8" id="nav-content">
                @guest
                <a class="text-blue-600 inline-block no-underline hover:text-black mr-4" href="{{ route('login') }}">
                    Login
                </a>
                @if (Route::has('register'))
                <a class="text-blue-600 inline-block no-underline hover:text-black" href="{{ route('register') }}">
                    Register
                </a>
                @endif
                @else
                <input type="search" name="" class="appearance-none hidden md:block rounded-lg block w-full bg-gray-300 text-gray-700 border border-gray-100 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Search ...">
                <a href="{{ route('logout') }}"
                class="no-underline hover:text-gray-800 text-blue-600 text-base py-3 px-4"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                </form>
                @endguest
            </div>
        </div>
    </nav>
    