<nav id="navbar-site" class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color:#111111">
    <div class="container">
        <a class="navbar-brand" href="{{route('homepage')}}">
            <img src="{{URL::to('img/logo2.png')}}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('homepage')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('question.show_all')}}">Tanya Tanya</a>
                </li>
                @auth                            
                    <li class="nav-item dropdown" id="dropdown">
                        <img src="{{asset('storage/'.Auth::user()->profile_picture_path)}}" id="profile-pic" alt="">
                        <a class="dropdown-toggle" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item">Action</a>
                            <a class="dropdown-item">Another action</a>
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
                    @endauth
                </ul>
                @guest
                    <div id="navbar-button" class="d-inline ml-4 my-2 my-md-0">
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
    const dropdown = document.getElementById('dropdown');
    const dropdownMenu = document.getElementsByClassName('dropdown-menu')[0];
    
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