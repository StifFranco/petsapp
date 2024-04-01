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


<div class="menu">
<a href="javascript:;" class="closem">X</a>
<nav>
    <img src="{{ asset('images') . '/' . Auth::user()->photo }}" alt="photo">
    <h4>{{ Auth::user()->fullname }}</h4>
    <h5>{{ Auth::user()->role }}</h5>
    <form action="{{ route('logout') }}" method="post">
        <button class="closes">Log Out</button>
        @csrf
    </form>
</nav>
</div>


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
        <h1>Dashboard Customer</h1>
     
        <menu>
            <ul>
                <li>
                    <a href="{{ url('mydata') }}">
                        <img src="{{ asset('images/ico-user.svg') }}" alt="icon-user">
                        <span>My Data</span>
                    </a>
                </li>
              
                <li>
                    <a href="{{ url('myadoptions') }}">
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
