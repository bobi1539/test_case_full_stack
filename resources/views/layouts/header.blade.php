<header class="navbar navbar-dark sticky-top bg-white flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/dashboard">Test Case</a>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form action="/logout" method="post">
                @csrf
                <button onclick="return confirm('Yakin ingin logout ?')" type="submit" class="btn btn-sm btn-primary m-2">
                    <span data-feather="log-out"></span> Logout
                </button>
            </form>
        </div>
    </div>
</header>
