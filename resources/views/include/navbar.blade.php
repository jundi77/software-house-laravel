<nav id="navbar-site" class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color:#111111">
    <div class="container">
        <a class="navbar-brand" href="{{route('landing-page')}}">
            <img src="{{URL::to('img/logo2.png')}}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            @auth
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Tanya Tanya</a>
                </li>                
            </ul> 
            @endauth
            @if (Auth::check())
            <p class="navbar-nav">profil</p>
            <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-inline ml-4 my-2 my-md-0">
                @csrf
                <button class="btn btn-second" type="submit">Keluar</a>
            </form>
            @else
            <div id="navbar-button" class="d-inline ml-4 my-2 my-md-0 ml-auto">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="btn btn-prim text-prim" href="{{route('register')}}">Daftar</a>
                    </li>
                    &emsp;
                    <li class="nav-item">
                    <a class="btn btn-second" href="{{route('login')}}">Masuk</a>
                    </li>                
                </ul>
            </div>
            @endif
        </div>
    </div>
</nav>