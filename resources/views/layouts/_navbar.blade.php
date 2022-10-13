<nav class="bg-black border-gray-200 px-2 sm:px-4 py-2.5 rounded">
    <div class="container flex flex-wrap justify-between items-center mx-auto">

        <a href="{{ url('/') }}" class="flex items-center">
            <span class="self-center text-xl font-semibold whitespace-nowrap">
                <!-- KU-Wide -->
                <img src="/images/logo.png" width="100" height="100" alt="Logo fill-current text-gray-500" />
            </span>

        </a>



        <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 "
                aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white ">
                @auth
                    <li class="text-emerald-500	">
                        {{ Auth::user()->email }}
                    </li>
                    <li>
                        <a href="{{ route('complaints.index') }}"
                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'complaints.index') current-page @endif" >
                            เรื่องร้องเรียน
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('complaints.create') }}"
                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'complaints.create') current-page @endif">
                            ส่งเรื่องร้องเรียน
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('chart.index') }}"
                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'organizations.index') current-page @endif" >
                            สรุปข้อมูล
                        </a>
                    </li>

                    <li class="">
                        <form class="" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a :href="route('logout')"
                                                onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                <span data-attr="logout">
                                    <a class="text-white" :href="route('logout')"
                                                onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                    </a>
                                </span>
                            </a>

                        </form>
                    </li>


                @else
                    <li>
                        <a href="{{ route('complaints.index') }}"
                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'complaints.index') current-page @endif" >
                            เรื่องร้องเรียน
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}"
                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'login') current-page @endif" >
                            Login
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('register') }}"
                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'register') current-page @endif" >
                            Register
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
