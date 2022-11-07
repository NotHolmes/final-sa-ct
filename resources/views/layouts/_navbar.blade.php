<!-- AlpineJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.8.1/cdn.min.js" defer></script>

<!-- Slider Component Container -->
<div class="flex flex-col items-center justify-center mt-32" x-cloak x-data="appData()" x-init="appInit()">
    <div class="flex flex-col">
        <!-- Page Scroll Progress -->
        <div class="fixed inset-x-0 top-0 z-50 h-0.5 mt-0.5
            bg-blue-500" :style="`width: ${percent}%`"></div>

        <!-- Navbar -->
        <nav class="flex justify-around py-4 bg-white/80
            backdrop-blur-md shadow-md w-full
            fixed top-0 left-0 right-0 z-10">

            <!-- Logo Container -->
            <div class="flex items-center">
                <!-- Logo -->
                <a class="cursor-pointer">
                    <h3 class="text-2xl font-medium text-blue-500">
                        <img class="h-10 object-cover"
                             src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fnexusfw.com%2Fuploads%2Fpage%2FMaintenance-Management-Logo.png&f=1&nofb=1&ipt=af759939106650904a322b72688f34964fcadfb2a4934d89ca052889caac2715&ipo=images" alt="Store Logo">
{{--                        todo : change logo--}}
                    </h3>
                </a>
            </div>

            <!-- Links Section -->
            <div class="items-center hidden space-x-8 lg:flex">
                <a class="flex text-gray-600 hover:text-blue-500
                    cursor-pointer transition-colors duration-300"
                    href="{{ route('maintenances.index') }}">
                    Home
                </a>

                <a class="flex text-gray-600 hover:text-blue-500
                    cursor-pointer transition-colors duration-300"
                   href={{ route('maintenances.create') }}>
                    Request a maintenance
                </a>

                @can('create', App\Models\Checklist::class)
                <a class="flex text-gray-600 hover:text-blue-500
                    cursor-pointer transition-colors duration-300"
                   href="{{ route('residents.create') }}">
                    Add resident
                </a>

                <a class="flex text-gray-600 hover:text-blue-500
                    cursor-pointer transition-colors duration-300"
                    href={{ route('maintenances.table') }}>
                    Requested maintenances
                </a>

                <a class="flex text-gray-600 hover:text-blue-500
                    cursor-pointer transition-colors duration-300"
                    href="{{ route('checklists.index') }}">
                    Checklists
                </a>

                <a class="flex text-gray-600 hover:text-blue-500
                    cursor-pointer transition-colors duration-300"
                   href="{{ route('parts.index') }}">
                    Spare parts
                </a>

                    <a class="flex text-gray-600 hover:text-blue-500
                    cursor-pointer transition-colors duration-300"
                       href="{{ route('reports.index') }}">
                        Reports
                    </a>
                @endcan

            </div>

            <!-- Icon Menu Section -->
            <div class="flex items-center space-x-5">
                <!-- Register -->
{{--                <a class="flex text-gray-600 hover:text-blue-500--}}
{{--                    cursor-pointer transition-colors duration-300">--}}

{{--                    <svg class="fill-current h-5 w-5 mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg"--}}
{{--                         xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24"--}}
{{--                         viewBox="0 0 24 24">--}}
{{--                        <path--}}
{{--                            d="M12 0L11.34 .03L15.15 3.84L16.5 2.5C19.75 4.07 22.09 7.24 22.45 11H23.95C23.44 4.84 18.29 0 12 0M12 4C10.07 4 8.5 5.57 8.5 7.5C8.5 9.43 10.07 11 12 11C13.93 11 15.5 9.43 15.5 7.5C15.5 5.57 13.93 4 12 4M12 6C12.83 6 13.5 6.67 13.5 7.5C13.5 8.33 12.83 9 12 9C11.17 9 10.5 8.33 10.5 7.5C10.5 6.67 11.17 6 12 6M.05 13C.56 19.16 5.71 24 12 24L12.66 23.97L8.85 20.16L7.5 21.5C4.25 19.94 1.91 16.76 1.55 13H.05M12 13C8.13 13 5 14.57 5 16.5V18H19V16.5C19 14.57 15.87 13 12 13M12 15C14.11 15 15.61 15.53 16.39 16H7.61C8.39 15.53 9.89 15 12 15Z" />--}}
{{--                    </svg>--}}

{{--                    Register--}}
{{--                </a>--}}
@auth
                <form class="" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="flex text-gray-600
                    cursor-pointer transition-colors duration-300
                    font-semibold text-blue-600" :href="route('logout')"
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ ('Logout') }}
                    </a>
                </form>
@else

                <!-- Login -->
                <form class="" method="get" action="{{ route('login') }}">
                    @csrf
                <a class="flex text-gray-600
                    cursor-pointer transition-colors duration-300
                    font-semibold text-blue-600" :href="route('logout')"
                   onclick="event.preventDefault(); this.closest('form').submit();">

                    <svg class="fill-current h-5 w-5 mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24"
                         viewBox="0 0 24 24">
                        <path
                            d="M10,17V14H3V10H10V7L15,12L10,17M10,2H19A2,2 0 0,1 21,4V20A2,2 0 0,1 19,22H10A2,2 0 0,1 8,20V18H10V20H19V4H10V6H8V4A2,2 0 0,1 10,2Z" />
                    </svg>

                    Login
                </a>
                </form>
            </div>
            @endauth
        </nav>

</div>
<script>
    const appData = () => {
        return {
            percent: 0,

            appInit() {
                // source: https://codepen.io/A_kamel/pen/qBmmGKJ
                window.addEventListener('scroll', () => {
                    let winScroll = document.body.scrollTop || document.documentElement.scrollTop,
                        height = document.documentElement.scrollHeight - document.documentElement.clientHeight;

                    this.percent = Math.round((winScroll / height) * 100);
                });
            },
        };
    };
</script>

{{--<nav class="bg-black border-gray-200 px-2 sm:px-4 py-2.5 rounded">--}}
{{--    <div class="container flex flex-wrap justify-between items-center mx-auto">--}}

{{--        <a href="{{ url('/') }}" class="flex items-center">--}}
{{--            <span class="self-center text-xl font-semibold whitespace-nowrap">--}}
{{--                <!-- KU-Wide -->--}}
{{--                <img src="/images/logo.png" width="100" height="100" alt="Logo fill-current text-gray-500" />--}}
{{--            </span>--}}

{{--        </a>--}}



{{--        <button data-collapse-toggle="navbar-default" type="button"--}}
{{--                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 "--}}
{{--                aria-controls="navbar-default" aria-expanded="false">--}}
{{--            <span class="sr-only">Open main menu</span>--}}
{{--            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"--}}
{{--                 xmlns="http://www.w3.org/2000/svg">--}}
{{--                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>--}}
{{--            </svg>--}}
{{--        </button>--}}
{{--        <div class="hidden w-full md:block md:w-auto" id="navbar-default">--}}
{{--            <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white ">--}}
{{--                @auth--}}
{{--                    <li class="text-emerald-500	">--}}
{{--                        {{ Auth::user()->email }}--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('maintenance.index') }}"--}}
{{--                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'maintenance.index') current-page @endif" >--}}
{{--                            เรื่องร้องเรียน--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('maintenance.create') }}"--}}
{{--                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'maintenance.create') current-page @endif">--}}
{{--                            ส่งเรื่องร้องเรียน--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('chart.index') }}"--}}
{{--                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'organizations.index') current-page @endif" >--}}
{{--                            สรุปข้อมูล--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="">--}}
{{--                        <form class="" method="POST" action="{{ route('logout') }}">--}}
{{--                            @csrf--}}
{{--                            <a :href="route('logout')"--}}
{{--                                                onclick="event.preventDefault();--}}
{{--                                                    this.closest('form').submit();">--}}
{{--                                <span data-attr="logout">--}}
{{--                                    <a class="text-white" :href="route('logout')"--}}
{{--                                                onclick="event.preventDefault();--}}
{{--                                                    this.closest('form').submit();">--}}
{{--                                    {{ __('Log Out') }}--}}
{{--                                    </a>--}}
{{--                                </span>--}}
{{--                            </a>--}}

{{--                        </form>--}}
{{--                    </li>--}}


{{--                @else--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('maintenance.index') }}"--}}
{{--                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'maintenance.index') current-page @endif" >--}}
{{--                            เรื่องร้องเรียน--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('login') }}"--}}
{{--                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'login') current-page @endif" >--}}
{{--                            Login--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li>--}}
{{--                        <a href="{{ route('register') }}"--}}
{{--                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'register') current-page @endif" >--}}
{{--                            Register--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endauth--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
