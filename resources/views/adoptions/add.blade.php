@extends('layouts.app')

@section('title', 'Show Pets - PetsApp')

@section('content')

<main>
        <header class="nav level-1">
            <a href="{{ url('pets') }}" >
                <img src="{{asset('images/icon-back.svg')}}" alt="back">
            </a>
            <img src="{{asset('images/Pet Logo.svg')}}" alt="logo">
            <a href="" class="mburguer">
                <img src="{{asset('images/Burguer Menu.svg')}}" alt="menu-burguer">
            </a>
        </header>

        
        <section class="show">
            <h1>ADOPTION</h1>
            <img src="{{asset('images/'.$pet->photo)}}" class="photo" alt="photo">
            {{--<p class="role">{{ $user->role }}</p>--}}
            <div class="info">
                <p>{{ $pet->name }}</p>
                <p>{{ $pet->type }}</p>
                <p>{{ $pet->weight }}</p>
                <p>{{ $pet->age }}</p>
                <p>{{ $pet->breed }}</p>
                <p>{{ $pet->location }}</p>
            </div>
            <form action="{{ url('myadoptions/store') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="pet_id" value="{{ $pet->id }}">
                <button class="btn">Adopt Me</button>
            </form>
        </section>

    </main>


@endsection