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