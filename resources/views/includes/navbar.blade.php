<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light navbar-responsive">
        <a href="{{route('home')}}" class="navbar-brand">
            <img src="{{url('/assets/images/SmartRT-Resize.png')}}" alt="Logo" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navb" aria-controls="navb"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2">
                    <a href="{{route('home')}}" class="nav-link active">Home</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="#Pariwisata" class="nav-link">Pariwisata</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="#contact" class="nav-link">Kontak</a>
                </li>
            </ul>

            @guest
            <!-- Mobile Button -->
            <form class="form-inline d-sm-block d-md-none">
                <button class="btn btn-login my-2 my-sm-0" type="button"
                    onclick="event.preventDefault(); location.href='{{url('login')}}'">Masuk</button>
            </form>
            <!-- End of Mobile -->

            <!-- Dekstop Button -->
            <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button"
                    onclick="event.preventDefault(); location.href='{{url('login')}}'">
                    Masuk
                </button>
            </form>
            <!-- End of Dekstop -->
            @endguest

            @auth
            <!-- Mobile Button -->
            <form class="form-inline d-sm-block d-md-none" action="{{url('logout')}}" method="POST">
                @csrf
                <button class="btn btn-login my-2 my-sm-0" type="submit">Keluar</button>
            </form>
            <!-- End of Mobile -->

            <!-- Dekstop Button -->
            <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{url('logout')}}" method="POST">
                @csrf
                <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
                    Keluar
                </button>
            </form>
            <!-- End of Dekstop -->
            @endauth
        </div>
    </nav>
</div>
