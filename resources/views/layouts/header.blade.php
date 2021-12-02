<header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/dashboard">Test Case</a>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form action="/logout" method="post">
                @csrf
                <button onclick="return confirm('Yakin ingin logout ?')" type="submit" class="nav-link px-3 bg-primary border-0">
                    <span data-feather="log-out"></span> Logout
                </button>
            </form>
        </div>
    </div>
</header>
