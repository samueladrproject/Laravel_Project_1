<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
    <div class="container">
        <a class="navbar-brand" href="{{ URL::to('/') }}"><b>SP Certainty Factor</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ URL::to('/') }}">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL::to('/konsultasi') }}">
                        <i class="fas fa-search-plus"></i>
                        Konsultasi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL::to('/info-penyakit') }}">
                        <i class="fas fa-book"></i>
                        Informasi Penyakit
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL::to('/tentang') }}">
                        <i class="fas fa-info-circle"></i>
                        Tentang
                    </a>
                </li>
            </ul>
            <div class="d-flex">
                @auth
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <b>{{ auth()->user()->name }}</b>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ URL::to('/dashboard') }}">
                                        <i class="fas fa-tachometer-alt me-1"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="{{ URL::to('/logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item" type="submit">
                                            <i class="fas fa-sign-out-alt me-1"></i>
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @else
                    <a class="btn btn-outline-primary" type="button" href="{{ URL::to('/login') }}">LOGIN</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
