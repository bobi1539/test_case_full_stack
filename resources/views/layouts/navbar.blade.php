<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Majoo Teknologi</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ $active == 'home' ? 'active' : '' }}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    @if (session()->has('email'))
                        <a class="nav-link {{ $active == 'dashboard' ? 'active' : '' }}"
                            href="/dashboard">Dashboard</a>
                    @else
                        <a class="nav-link {{ $active == 'login' ? 'active' : '' }}" href="/login">Login Admin</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
