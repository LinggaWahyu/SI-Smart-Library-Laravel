{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

@extends('layouts.login')

@section('title')
    Login Smart Library
@endsection

@section('content')
  <section class="page-content">
    <div class="page-login">
      <div class="container">
        <div class="row">
          <div class="col-8 justify-content-center text-center">
            <img
              src="/SI-Library/images/login-image.png"
              alt="Login Imagae"
              width="500px"
            />
          </div>
          <div class="col-4 mt-5">
            <div class="login-card">
              <div class="card">
                <div class="card-body text-center">
                  <h4><b>Login Smart Library</b></h4>
                  <br />
                  <form method="POST" action="{{ route('login') }}" class="text-left">
                    @csrf
                    <div class="form-group">
                      <label for="email"
                        >Email</label
                      >
                      <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                      <small id="emailHelp" class="form-text text-muted"
                        >Masukkan email anda yang telah terdaftar.</small
                      >
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                    </div>
                    <button
                      type="submit"
                      class="btn btn-primary btn-block mt-4"
                    >
                      Login
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection