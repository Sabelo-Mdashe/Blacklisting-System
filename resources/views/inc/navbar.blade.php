  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          <span @class(['blklst'])>Blacklisting</span> System
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/schools">Schools</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/students">Students</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/blacklistings">Blacklistings</a>
              </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    {{-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif --}}
                @else
                    <li class="nav-item dropdown">
                        <div @class(['d-flex', 'gap-1']) id="navbarDropdown" aria-haspopup="true" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="nav-avatar" src="{{ url('/') }}/storage/avatars/{{ Auth::user()->avatar }}" alt="">
                            <a class="nav-link dropdown-toggle"  href="#" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                        </div>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <div @class(['d-flex', 'gap-3', 'dropdown-item', 'align-items-center'])>
                                <i class="fa-solid fa-user"></i>
                                <a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Profile</a>
                            </div>
                          
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" @class(['d-flex', 'gap-3', 'dropdown-item', 'align-items-center'])>
                                <i class="fa-solid fa-right-from-bracket"></i>
                                    {{ __('Logout') }}
                                </a>

                            {{-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Toggle right offcanvas</button> --}}

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-brand {
        font-family: 'MuseoModerno', cursive;
    }

    .blklst {
        text-decoration-line: line-through;
        text-decoration-color: red
    }

    .nav-avatar {
        border-radius: 50%;
        width: 2.5rem;
    }

</style>