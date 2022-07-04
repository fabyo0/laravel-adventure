<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            {{--Route::is() bu route da ise --}}
            <li class="nav-item {{Route::is('index') ? 'active' : ''}} ">
                <a class="nav-link" href="{{route('index')}}">Anasayfa<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{Route::is('about') ? 'active' : ''}} ">
                <a class="nav-link" href="{{route('about')}}">Hakkımızda</a>
            </li>
            <li class="nav-item {{Route::is('contact') ? 'active' : ''}} ">
                <a class="nav-link" href="{{route('contact')}}">İletişim</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
