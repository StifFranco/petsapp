@extends('layouts.app')
@section('title', 'Pets Page - PetsApp')

@section('content')
    <main>
        <header class="nav level-2">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('images/icon-back.svg') }}" alt="back">
            </a>
            <img src="{{ asset('images/Pet Logo.svg') }}" alt="logo">
            <a href="" class="mburguer">
                <img src="{{ asset('images/Burguer Menu.svg') }}" alt="menu-burguer">
            </a>
        </header>

        <section class="module">
            <h1>Module Users</h1>
            <a class="add" href="{{ url('users/create') }}">
                <img src="{{ asset('images/add-icon.svg') }}" width="30px" alt="add">
                Add User
            </a>

            <table>
                <tbody>

                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <img src="{{ asset('images/' . $user->photo) }}" alt="User">
                            </td>
                            <td>
                                <span>{{ $user->fullname }}</span>
                                <span>{{ $user->role }}</span>
                            </td>
                            <td>
                                <a href="{{ url('users/' . $user->id) }}" class="show">
                                    <img src="{{ asset('images/icon-Search.svg') }}" alt="show icon">
                                </a>
                                <a href="{{ url('users/' . $user->id . '/edit') }}" class="edit">
                                    <img src="{{ asset('images/icon -Edit.svg') }}" alt="edit icon">
                                </a>
                                <form action="{{ url('users/'.$user->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn-delete">
                                        <img src="{{ asset('images/Icon-Delete.svg') }}" alt="delete icon">
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">{{ $users->links('layouts.paginator') }}

                        </td>
                    </tr>
                </tfoot>
            </table>
        </section>

    </main>
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
    <script>
        $(document).ready(function() {
            $('body').on('click', '.btn-delete', function() {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "error",
                    showCancelButton: true,
                    confirmButtonColor: "#22799e",
                    cancelButtonColor: "#2ec4b6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        if (result.isConfirmed) {
                            $(this).parent().submit()
                        }
                    }
                })

            })
        })
    </script>
@endsection
