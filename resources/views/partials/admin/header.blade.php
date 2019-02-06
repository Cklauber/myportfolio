<header>
<nav class="navbar is-light has-shadow" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a href="/" class="navbar-item">
                <img src="/img/logo.png" alt="Clauber Oliveira">
            </a>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbar">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div id="navbar" class="navbar-menu">
            <div class="navbar-start">

                    <a href="{{route('home')}}" class="navbar-item">Dashboard</a>
                    <a href="{{route('admin.project.index')}}" class="navbar-item">Projects</a>
            
            </div>
            
            <div class="navbar-end">

                <div class="navbar-item has-dropdown" id="right-button">

                        <a class="navbar-link" onclick="event.preventDefault();
                        document.getElementById('right-button').classList.toggle('is-active');">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="navbar-dropdown is-right">

                            <div class="navbar-item">
                                <a class="navbar-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>

                            </div>

                        </div>
                </div>

            </div>
        </div>
    </div>
</nav>
</header>