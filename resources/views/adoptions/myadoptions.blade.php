@extends('layouts.app')
@section('title', 'Adoption Page - PetsApp')

@section('content')
<header class="nav level-2">
    <a href="{{ route('dashboard') }}">
        <img src="{{ asset('images/icon-back.svg') }}" alt="Back">
    </a>
    <img src="{{ asset('images/Pet logo.svg') }}" alt="Logo">
    <a href="javascript:;" class="mburger">
        <img src="{{ asset('images/mburger.svg') }}" alt="Menu Burger">
    </a>
</header>
<section class="module">
    <h1>My Adoptions</h1>
    <a class="add" href="{{ url('adoptions/create') }}">
        <img src="{{ asset('images/add-icon.svg') }}" width="30px" alt="add">
        Add adoption
    </a>
    <table>
        <tbody class='adoptions'>
        @forelse ($adps as $adop)
            <tr>
                <td>
                    <img src="{{ asset('images/'.$adop->user->photo) }}" alt="User">
                    <img src="{{ asset('images/'.$adop->pet->photo) }}" alt="User">
                </td>
                <td>
                    <span>{{ $adop->user->fullname }}</span>
                    <span>{{ $adop->pet->name }}</span>
                    <span>{{ $adop->created_at->diffforhumans() }}</span>
                </td>
            </tr>
            @empty
                    <p class="no-adoptions">
                        You have no yet adoptions <br>
                        Please make one 
                    </p>
            @endforelse
        </tbody>
    </table>
</section>
@endsection
@section('js')
    @if (session('message'))
        <script>
        $(document).ready(function () {
            Swal.fire({
                position: "top-end",
                title: "Great job!",
                text: "{{ session('message') }}",
                icon: "success",
                showConfirmButton: false,
                timer: 5000
            })
        })
        </script>
    @endif
@endsection