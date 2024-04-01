{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
@extends('layouts.app')

@section('title', 'Dashboard Page - PetsApp')

@section('content')

@include('layouts.menuburguer')

<main>
    <header class="nav level-0">
        <a href="">
            <img src="{{ asset('images/icon-back.svg') }}" alt="back">
        </a>
        <img src="{{ asset('images/Pet Logo.svg') }}" alt="logo">
        <a href="javascript:;" class="mburguer">
            <img src="{{ asset('images/Burguer Menu.svg') }}" alt="menu-burguer">
        </a>
    </header>

    
    <section class="dashboard">
        <h1>Dashboard Administrator</h1>
        <menu>
            <ul>
                <li>
                    <a href="{{ url('users') }}">
                        <img src="{{ asset('images/ico-user.svg') }}" alt="icon-user">
                        <span>Module User</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('pets') }}">
                        <img src="{{ asset('images/icon-pet.svg') }}" alt="icon-pet">
                        <span>Module Pets</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('adoptions') }}">
                        <img src="{{ asset('images/icon-adopt.svg') }}" alt="icon-adoption">
                        <span>Module Adoptions</span>
                    </a>
                </li>
            </ul>
        </menu>
    </section>
@endsection

@section('js')
 <script>
   $(document).ready(function () {


$('body').on('click', '.mburguer', function () {
    $('.menu').addClass('open')
})
$('body').on('click', '.closem', function () {
    $('.menu').addClass('close')
    setTimeout(() => {
        $('.menu').removeClass('open')
        $('.menu').removeClass('close')
    })
})    
});
</script>
@endsection
