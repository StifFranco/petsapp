@extends('layouts.app')

@section('title', 'Show Users - PetsApp')

@section('content')

<main>
        <header class="nav level-1">
            <a href="{{ url('users') }}" >
                <img src="{{asset('images/icon-back.svg')}}" alt="back">
            </a>
            <img src="{{asset('images/Pet Logo.svg')}}" alt="logo">
            <a href="" class="mburguer">
                <img src="{{asset('images/Burguer Menu.svg')}}" alt="menu-burguer">
            </a>
        </header>

        
        <section class="show">
            <h1>Show User</h1>
            <img src="{{asset('images/'.$user->photo)}}" class="photo" alt="photo">
            <p class="role">{{ $user->role }}</p>
            <div class="info">
                <p>{{ $user->document }}</p>
                <p>{{ $user->fullname }}</p>
                <p>{{ $user->email }}</p>
                <p>{{ $user->phone }}</p>
                <p>{{ $user->gender }}</p>
                <p>{{ Carbon\Carbon::parse($user->birthdate)->diffforhumans() }}</p>

            </div>
       
        </section>

    </main>


@endsection