@extends('layouts.app')

@section('title', 'Welcome Page- PetsApp')

@section('content')
    <header>
        <img src="{{ asset('images/Pet Logo.svg') }}" alt="Logo">   
    </header>    
        <section class="Homepage">
            <img src="{{ asset('images/Image Begin.png') }}" alt="Logo">
            <a href="{{ url('login/') }}">Enter</a>
        </section>

@endsection