<header>
    <nav class="flex items-center bg-white pin pin-t border-b border-grey z-100 h-16 " role="navigation"
        aria-label="main navigation">

        <div id="navbar" class="container mx-auto flex h-full items-center">

            <div class="flex justify-between w-full h-full lg:-mx-auto">

                {{-- Left Side --}}
                <div class="flex items-center -px-4">

                    <a href="/" class="">
                        <img src="/img/logo.png" alt="Clauber Oliveira" class="h-10">
                    </a>

                    <a href="{{route('home')}}" class="navbar-item h-full text-center">Dashboard</a>

                    <a href="{{route('admin.project.index')}}" class="navbar-item">Projects</a>

                    @if (\Auth::user()->id == 1)

                    <a href="{{route('admin.page.index')}}" class="navbar-item">Pages</a>

                    @endif
                    

                </div>

                {{-- Right Side --}}
                <div class="">

                    <a class="navbar-link" onclick="event.preventDefault();
                        document.getElementById('right-button').classList.toggle('is-active');">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="navbar-dropdown is-right">

                        <div class="">
                            <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
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
    </nav>
</header>