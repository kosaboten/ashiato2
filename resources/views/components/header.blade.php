<header>
    <div id="header-title">ASHIATO</div>
    <ul>
        @if (Auth::check() || Auth::guard('company'))
            @auth('company')
                <li><a href="{{ route('portfolios.index') }}">PORTFOLIOS</a></li>
                <li><a href="{{ route('jobs.index') }}">JOBS</a></li>
                <li><a href="{{ route('jobs.create') }}">NEW</a></li>
                <li>
                    <a href="{{ route('companies.logout') }}">
                        LOG_OUT
                    </a>
                </li>
            @else
                @auth('web')
                    <li><a href="#">LIKES</a></li>
                    <li><a href="{{ route('portfolios.edit', Auth::id()) }}">EDIT</a></li>
                    <li>
                        <form action="{{ route('portfolios.store') }}" method="post">
                            @csrf
                            <input type="submit" value="NEW" style="color: white">
                        </form>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <input type="submit" value="LOG_OUT" style="color: white; font-family: 'Microsoft New Tai Lue';">
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('register') }}">SIGN_UP</a></li>
                    <li><a href="{{ route('login') }}">LOG_IN</a></li>
                @endauth
            @endauth
        @endif

        @if (Auth::check() || Auth::guard('company'))
            <li>
                @auth('web')
                    <a href="{{ route('profile.edit') }}">{{ Auth::user()->name }}</a>
                @else
                    @auth('company')
                        {{ Auth::guard('company')->user()->name }}
                    @else
                        GUEST
                    @endauth
                @endauth
            </li>
        @endif
    </ul>
</header>
