<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom px-5 mb-0 shadow-sm z-3">
    <div class="container-fluid px-5">
        <a class="navbar-brand ms-5" href="/">Expense<span class="fw-bold">Tracker</span></a>
        <button class="navbar-toggler me-5" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler"
            aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse me-5" id="navbarToggler">
            <ul class="navbar-nav align-items-center ms-auto">

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
                @auth
                    <li class="nav-item ms-3">
                        <a class="nav-link" href="/expenses/types">Expense Types</a>
                    <li class="nav-item ms-3">
                        <a class="nav-link" href="/expenses">Expenses</a>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="btn btn-outline-primary ms-3" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/profile">Profile</a></li>
                            <li>
                                <a class="dropdown-item"type="submit" href="/logout">Logout</a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item ms-3">
                        <a class="btn btn-outline-primary mx-2" href="/login">Login</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="btn btn-primary" href="/register">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
