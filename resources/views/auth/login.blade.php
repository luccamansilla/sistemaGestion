<x-guest-layout>
    @section('body-style')
        <style>
            body {
                overflow: hidden;
                /* tu estilo específico aquí */
            }
        </style>
    @endsection
    <section class="bg-white ">
        {{-- <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
            <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
            Flowbite
        </a> --}}
        <div class="grid grid-cols-2 overflow-hidden max-h-screen">
            <div class="col-span-1 mb-6 pl-6 pt-3">
                <a href="#" class="flex items-start text-2xl font-semibold text-gray-900 pt-2">
                    <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg"
                        alt="logo">
                    Kernel
                </a>
            </div>
            <div class="flex flex-col items-center justify-center px-6 py-8 mt-14 mb-12 mx-auto w-full lg:py-0">
                <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 ">
                    <div class="p-6 space-y-0 md:space-y-0 sm:p-8">
                        <h1 class="text-2xl font-bold leading-tight tracking-tight text-gray-900 text-center">
                            @lang('login.title')
                            {{-- ¡Bienvenido a tu consola! --}}
                        </h1>
                        <h1 class="text-sm leading-tight tracking-tight text-gray-600 text-center">
                            @lang('login.subtitle')
                            {{-- Portal de cuentas Kernel. --}}
                        </h1>

                        <form class="space-y-4 md:space-y-4" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div>
                                <x-label for="email">E-mail</x-label>
                                {{-- class="block mb-2 text-sm font-medium text-gray-900 " --}}
                                <x-input type="email" name="email" id="email"
                                    placeholder="Tu correo electronico" required="" class="w-full"></x-input>
                                {{-- class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " --}}
                            </div>
                            <div x-data="{ show: true }">
                                <div class="relative">
                                    <x-label for="password">@lang('login.password')</x-label>
                                    {{-- class="block w-full mb-2 text-sm font-medium text-gray-900 " --}}
                                    <input type="password" :type="show ? 'password' : 'text'" name="password"
                                        id="password" placeholder="Tu contraseña"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                        required="">

                                    <div
                                        class="absolute inset-y-0 right-0 pr-3 pt-5 flex items-center text-sm leading-5">
                                        <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                                            :class="{ 'hidden': !show, 'block': show }"
                                            xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                            <path fill="currentColor"
                                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                            </path>
                                        </svg>
                                        <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                                            :class="{ 'block': !show, 'hidden': show }"
                                            xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                            <path fill="currentColor"
                                                d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="remember" aria-describedby="remember" type="checkbox"
                                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 ">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="remember" class="text-gray-900 ">@lang('login.rememberMe')</label>
                                    </div>
                                </div>
                                <a href="#"
                                    class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">@lang('login.forgotPass')</a>
                            </div>
                            <button type="submit"
                                class="w-full text-white bg-gradient-to-r from-green-600 via-emerald-700 to-indigo-950 focus:ring-4 hover:to-indigo-950 hover:from-green-900 hover:via-esmerald-900 font-medium rounded-lg text-m px-5 py-2.5 text-center">@lang('login.login')</button>
                            <p class="text-sm font-light text-gray-500 text-center"><a href="{{ route('register') }}"
                                    class="font-medium text-primary-600 hover:underline dark:text-primary-500 ">@lang('login.register')</a>
                            </p>
                            <div class="text-center">
                                <select class="changeLang rounded-lg border-gray-300" id="changeLang">
                                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>
                                        @lang('login.english')
                                    </option>
                                    <option value="es" {{ session()->get('locale') == 'es' ? 'selected' : '' }}>
                                        @lang('login.spanish')
                                    </option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div>

                <p class="ml-10 text-sm text-gray-400 mb-10">@lang('login.copyright')</p>
            </div>
        </div>
    </section>
    {{-- <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <a href="{{ route('register') }}"><x-buttonClassic>Registrarme</x-buttonClassic></a>


                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card> --}}
</x-guest-layout>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var changeLang = document.getElementById("changeLang");

        if (changeLang) {
            changeLang.addEventListener("change", function() {
                //    window.location.href= "{{ url('lo') }}"
                var selectedValue = this.value;
                // alert(selectedValue);
                window.location.href = "{{ url('locale') }}/" + selectedValue;
            });
        }
    });
</script>
