@extends('layouts.app')

@section('title', 'Edit Users - PetsApp')

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

    <form action="{{ url('users/'.$user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="hidden" name="photoactual" value="{{ $user->photo }}">
        <img src="{{ asset('images/'.$user->photo) }}" id="upload" alt="upload-photo" width="220px">
        <input type="file" name="photo" id="photo" accept="image/*">
        <input type="number" name="document" placeholder="Document" value="{{ old('document', $user->document) }}">
        <input type="text" name="fullname" placeholder="Full Name" value="{{ old('fullname', $user->fullname) }}">
        <select name="gender">
            <option value="">SELECT GENDER...</option>
            <option value="Female" @if(old('gender') == 'Female') selected @endif>FEMALE</option>
            <option value="Male" @if(old('gender')  == 'Male') selected @endif>MALE</option>
            <option value="Other" @if(old('gender') == 'Other') selected @endif>OTHER</option>
        </select>
        <input type="date" name="birthdate" placeholder="Birthdate" value="{{ old('birthdate', $user->birthdate) }}">
        <input type="text" name="phone" placeholder="Phone Number" value="{{ old('phone', $user->phone) }}">
        <input type="email" name="email" placeholder="Email" value="{{ old('email', $user->email) }}">
  
        <button type="submit">EDIT</button>
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
