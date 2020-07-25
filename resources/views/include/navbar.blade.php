<nav id="navbar-site" class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color:#111111">
    <div class="container">
        <a class="navbar-brand" href="{{route('homepage')}}">
            <p style="
            font-family: Raleway;
            font-size: 40px;
            font-weight: 900;
            letter-spacing: -0.049em;
            color: white;
            margin-bottom: 0px
            ">TanyaAja</p>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            @auth
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home_q')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('question.show_all')}}">Tanya Tanya</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown">Cari</a>
                        <form action="{{route('question.show_all')}}" method="get" id="search-navbar" class="dropdown-menu dropdown-menu-right">
                            <div class="input-group">
                                <input class="form-control" type="text" name="search" id="search-navbar-input" placeholder="Cari pertanyaan..." size=50>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-light" type="submit">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>                 
                    <li class="nav-item dropdown" id="dropdown-account">
                        <img src="
                        @if(Auth::user()->profile_picture_path != 'NULL')
                        {{asset('storage/'.Auth::user()->profile_picture_path)}}
                        @else
                        {{URL::to('img/default-user-icon.jpg')}}
                        @endif
                        " id="profile-pic" alt="">
                        <a class="dropdown-toggle" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" id="dropdown-menu-account">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Keluar
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>                        
                    </li>
                </ul>
                @endauth
                @guest
                    <div id="navbar-button" class="d-inline ml-auto my-2 my-md-0">
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
                @endguest
                
        </div>
    </div>
</nav>
<script>
    const dropdown = document.getElementById('dropdown-account');
    const dropdownMenu = document.getElementById('dropdown-menu-account');
    
    if (dropdownMenu) {
        dropdown.onmouseover = (e) => {
            dropdown.setAttribute("aria-expanded", true);
            e.target.classList.add("show");
            dropdownMenu.classList.add("show");
        }
        dropdown.onmouseout = (e) => {
            dropdown.setAttribute("aria-expanded", true);
            e.target.classList.remove("show");
            dropdownMenu.classList.remove("show");
        }
    }
</script>