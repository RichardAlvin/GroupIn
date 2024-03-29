<section class="topbar">
    <div class="topbar-left">
        <a href="/" style="color: white; text-decoration:none;"><h1>GroupIn</h1></a>
    </div>
    <div class="topbar-center">
        <ul>
            <a href="/training"><li>Training</li></a>
            <a href="/competition"><li>Competition</li></a>
            <a href="/scholarship"><li>Scholarship</li></a>
        </ul>
    </div>
    <div class="topbar-right">
        @guest
            <a href="/signup" class="btn btn-primary">SignUp</a>
            <a href="/login" class="btn btn-secondary">LogIn</a>
        @else
            <div class="topbar-right-wrapper" id="userMenu">
                <div class="show-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16"> <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/> </svg>
                    <h2>{{ Auth::user()->name }}</h2>
                </div>
                <div class="hidden-wrapper">
                    <a href="/group?Group=Own">My Group</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                        >Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </div>
        @endguest
    </div>
</section>