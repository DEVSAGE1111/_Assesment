<nav class="navbar navbar-expand-md navbar-light bg-white border-bottom shadow-sm sticky-top">
    <div class="container py-2">

        <!-- Branding -->
        <a href="{{ route('home') }}" class="navbar-brand fw-bold text-primary fs-4">
            <i class="bi bi-journal-text me-2"></i> Blog<span class="text-dark">Site</span>
        </a>

        <!-- Mobile Toggler -->
        <button
            class="navbar-toggler border-0"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarCollapse">

            <!-- Left Section -->
            <ul class="navbar-nav me-auto">
                @admin
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}"
                           class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active text-primary fw-semibold' : '' }}">
                            <i class="bi bi-speedometer2 me-1"></i>
                            @lang('dashboard.dashboard')
                        </a>
                    </li>
                @endadmin

                @if(Auth::user() && auth()->user()->isEditor())
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                           class="nav-link {{ request()->routeIs('dashboard') ? 'active text-primary fw-semibold' : '' }}">
                            <i class="bi bi-grid me-1"></i>
                            @lang('dashboard.dashboard')
                        </a>
                    </li>
                @endif
            </ul>

            <!-- Right Section -->
            <ul class="navbar-nav ms-auto align-items-center">

                @guest
                    <li class="nav-item me-2">
                        <a href="{{ route('login') }}" class="btn btn-outline-primary px-3">
                            <i class="bi bi-box-arrow-in-right me-1"></i> @lang('auth.login')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-primary px-3">
                            <i class="bi bi-person-plus me-1"></i> @lang('auth.register')
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle d-flex align-items-center gap-2"
                           id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                                 alt="Avatar" class="rounded-circle" width="32" height="32">
                            <span class="fw-semibold">{{ Auth::user()->name }}</span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow-sm rounded-3 border-0"
                            aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a href="{{ route('users.show', Auth::user()) }}" class="dropdown-item">
                                    <i class="bi bi-person me-2"></i> @lang('users.public_profile')
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('users.edit') }}" class="dropdown-item">
                                    <i class="bi bi-gear me-2"></i> @lang('users.settings')
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a href="{{ url('/logout') }}" class="dropdown-item text-danger"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-2"></i> @lang('auth.logout')
                                </a>
                            </li>
                            <form id="logout-form" class="d-none" action="{{ url('/logout') }}" method="POST">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
