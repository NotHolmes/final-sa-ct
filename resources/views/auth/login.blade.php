<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="/images/logo_crop.png" width="200" height="200" alt="Logo fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="username" :value="__('Username')" />

                <x-input id="username" class="block mt-1 w-full" name="username" :value="old('username')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>

    </x-auth-card>
</x-guest-layout>



<!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
<script src="{{ asset('js/app.js') }}" defer></script>

<section class="h-screen">
   <div class="container px-6 py-12 h-full">
       <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
           <div class="md:w-8/12 lg:w-6/12 mb-12 md:mb-0 flex items-center justify-end mt-4">
              <img src="/images/logo_crop.png" width="200" height="200" alt="Logo fill-current text-gray-500" class="text-center"/>
            </div>
            <div class="md:w-8/12 lg:w-5/12 lg:ml-20">
              <form>
                   <div class="mb-6">
                        <input
                            type="text"
                           class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            placeholder="Email address"
                        />
                    </div>

                    <div class="mb-6">
                       <input--}}
                            type="password"
                            class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                           placeholder="Password"
                        />
                   </div>

                    <div class="flex justify-between items-center mb-6">
                        <div class="form-group form-check">
                           <input
                                type="checkbox"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                id="exampleCheck3"
                                checked
                            />
                           <label class="form-check-label inline-block text-gray-800" for="exampleCheck2"
                            >Remember me</label
                           >
                        </div>
                       <a
                            href="#!"
                            class="text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 duration-200 transition ease-in-out"
                        >Forgot password?</a
                       >
                    </div>

                   <button
                        type="submit"
                       class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full"
                        data-mdb-ripple="true"
                       data-mdb-ripple-color="light"
                    >
                        Sign in
                    </button>
                </form>
            </div>
        </div>
</div>
</section> -->
