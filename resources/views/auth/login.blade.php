@extends('layouts.admin')

@section('content')
    <section class="bg-wood-50 dark:bg-wood-900">
        <div
            class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 rounded-2xl shadow-sm border-wood-600">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-wood-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
                Admin toko brankas
            </a>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-wood-800 dark:border-wood-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-wood-900 md:text-2xl dark:text-white">
                        Sign in to your account
                    </h1>
                    @if ($errors->any())
                        <div class="mt-4" style="color: red;">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-wood-900 dark:text-white">Your
                                email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="bg-wood-50 border border-wood-300 text-wood-900 rounded-lg focus:ring-wood-600 focus:border-wood-600 block w-full p-2.5 dark:bg-wood-700 dark:border-wood-600 dark:placeholder-wood-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-wood-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-wood-50 border border-wood-300 text-wood-900 rounded-lg focus:ring-wood-600 focus:border-wood-600 block w-full p-2.5 dark:bg-wood-700 dark:border-wood-600 dark:placeholder-wood-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="w-4 h-4 border border-wood-300 rounded bg-wood-50 focus:ring-3 focus:ring-wood-300 dark:bg-wood-700 dark:border-wood-600 dark:focus:ring-wood-600 dark:ring-offset-wood-800"
                                        required="">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-wood-500 dark:text-wood-300">Remember me</label>
                                </div>
                            </div>
                            {{-- <a href="#"
                                class="text-sm font-medium text-wood-600 hover:underline dark:text-wood-500">Forgot
                                password?</a> --}}
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-wood-600 hover:bg-wood-700 focus:ring-4 focus:outline-none focus:ring-wood-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-wood-600 dark:hover:bg-wood-700 dark:focus:ring-wood-800">Sign
                            in</button>
                        {{-- <p class="text-sm font-light text-wood-500 dark:text-wood-400">
                            Don’t have an account yet? <a href="#"
                                class="font-medium text-wood-600 hover:underline dark:text-wood-500">Sign up</a>
                        </p> --}}
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
