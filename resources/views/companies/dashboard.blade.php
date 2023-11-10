<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <header>
        <div id="header-title">ASHIATO</div>
        <ul>
            @auth
            @else
                <li><a href="{{ route('register') }}">SIGN_UP</a></li>
                <li><a href="{{ route('login') }}">LOG_IN</a></li>
            @endauth
            @if (Auth::check() || Auth::guard('company'))
                @auth('web')
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <input type="submit" value="LOG_OUT"
                                style="color: white; font-family: 'Microsoft New Tai Lue';">
                        </form>
                    </li>
                @endauth
                @auth('company')
                    <li><a href="{{ route('jobs.create') }}">NEW</a></li>
                    <li>
                        <a href="{{ route('companies.logout') }}">
                            LOG_OUT
                        </a>
                    </li>
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
    <div id="contents">

    </div>

</body>

</html>
