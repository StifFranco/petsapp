@extends('layouts.app')
@section('title', 'Adoption Page - PetsApp')

@section('content')
<header class="nav level-2">
    <a href="{{ url('myadoptions') }}">
        <img src="{{ asset('images/icon-back.svg') }}" alt="Back">
    </a>
    <img src="{{ asset('images/Pet logo.svg') }}" alt="Logo">
    <a href="javascript:;" class="mburger">
        <img src="{{ asset('images/mburger.svg') }}" alt="Menu Burger">
    </a>
</header>
<section class="module">
    <h1>Adoptions</h1>
    <div class="pets">
        @forelse ($pets as $pet)
            
        <article>
            <header>
                <img src="{{ asset('images/'.$pet->photo) }}" alt="pet">
                <p>
                    <span>
                        {{$pet->name}}
                    </span>
                    <span>
                        {{$pet->type}}
                    </span>
                </p>
            </header>
            <footer>
                <a href="{{ url('myadoptions/add/' . $pet->id) }}">View</a>
            </footer>
        </article>
        @empty
            
        @endforelse
    </div>
</section>
@endsection
@section('js')
    @if (session('message'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    position: "top-end",
                    title: "Congratulions!",
                    text: "{{ session('message') }}",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 5000
                })
            })
        </script>
    @endif
@endsection