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

    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <img src="{{ asset('images/ico-upload-user.svg') }}" id="upload" alt="upload-photo" width="220px">
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
