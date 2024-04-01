{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('layouts.app')

@section('title', 'Register Page - PetsApp')

@section('content')

    <header><img src="{{ asset('images/Pet Logo.svg') }}" alt="">
    </header>

    <section class="create register">
        <menu>
            <a href="{{ url('login/') }}">Login</a>
            <a href="javascript:;">Register</a>
        </menu>
        <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
            @csrf
            <img src="{{ asset('images/Pet-upload.svg') }}" id="upload" alt="upload-photo" width="220px">
            <input type="file" name="photo" id="photo" accept="image/*">
            <input type="number" name="document" placeholder="Document" value="{{ old('document') }}">
            <input type="text" name="fullname" placeholder="Full Name" value="{{ old('fullname') }}">
            <select name="gender">
                <option value="">SELECT GENDER...</option>
                <option value="Female" @if(old('gender') == 'Female') selected @endif>FEMALE</option>
                <option value="Male" @if(old('gender')  == 'Male') selected @endif>MALE</option>
                <option value="Other" @if(old('gender') == 'Other') selected @endif>OTHER</option>
            </select>
            <input type="date" name="birthdate" placeholder="Birthdate" value="{{ old('birthdate') }}">
            <input type="text" name="phone" placeholder="Phone Number" value="{{ old('phone') }}">
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="password_confirmation" placeholder="Confirmed Password">
            <button type="submit">Register</button>
        </form>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#upload').click(function(e) {
                e.preventDefault();
                $('#photo').click()
            })

            $('#photo').change(function(e) {
                e.preventDefault();
                let reader = new FileReader()
                reader.onload = function(event) {
                    $('#upload').attr('src', event.target.result)
                }
                reader.readAsDataURL(this.files[0])
            });
        })
    </script>
    @if (count($errors->all()) > 0)

        @php $error = '' @endphp
        @foreach ($errors->all() as $message)
            @php $error .= '<li>' .  $message . '</li>' @endphp
        @endforeach
         <script>
            $(document).ready(function() {
                Swal.fire({
                    position: "top-end",
                    title: "Ops!",
                    html: `@php echo $error @endphp`,
                    icon: "error",
                    showConfirmButton: false,
                    timer: 5000
                })
            })
        </script>
    @endif
@endsection
