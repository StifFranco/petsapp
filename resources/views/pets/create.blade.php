@extends('layouts.app')
@section('title', 'Create User Page - PetsApp')

@section('content')
<header class="nav level-2">
    <a href="{{ url('users') }}">
        <img src="{{ asset('images/icon-back.svg') }}" alt="back">
    </a>
    <img src="{{ asset('images/Pet Logo.svg') }}" alt="logo">
    <a href="javascript:;" class="mburguer">
        <img src="{{ asset('images/Burguer Menu.svg') }}" alt="menu-burguer">
    </a>
</header>
<section class="create register">

    <form action="{{ route('pets.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <img src="{{ asset('images/Pet-upload.svg') }}" id="upload" alt="upload-photo" width="220px">
        <input type="file" name="photo" id="photo" accept="image/*">
        <input type="text" name="name" placeholder="Name Pet" value="{{ old('name') }}">
        <input type="text" name="type" placeholder="Type" value="{{ old('type') }}">
        <input type="number" name="weight" placeholder="Weight" value="{{ old('weight') }}">
        <input type="number" name="age" placeholder="Age" value="{{ old('age') }}">
        <input type="text" name="breed" placeholder="Breed" value="{{ old('breed') }}">
        <input type="text" name="location" placeholder="Location" value="{{ old('location') }}">
        <button type="submit">ADD</button>
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
