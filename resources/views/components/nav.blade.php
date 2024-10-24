@php
    $route = Route::current()->getName();
@endphp
<nav class="nav-desktop">
    <div class="div-logo">
        <p class="logo">NOVA</p>
    </div>
    <div class="div-nav-links">
        <a @class(['selected' => $route == 'home', 'nav-links', 'green-text']) class="" href="{{ route('home') }}">Home</a>
        <a @class([
            'selected' => $route == 'activity.index',
            'nav-links',
            'blue-text',
        ]) href="{{ route('activity.index') }}">Festival</a>
        <a @class([
            'selected' => $route == 'article.index',
            'nav-links',
            'purple-text',
        ]) href="{{ route('article.index') }}">Articles</a>
        <a @class(['selected' => $route == '', 'nav-links', 'pink-text']) href="/#footer">Contact</a>
        @auth
            <a class="btn-blue-pink btn-login-logout" href="{{ route('logout') }}">Logout</a>
        @else
            <a class="btn-blue-pink btn-login-logout" href="{{ route('loginOrRegister') }}">Login</a>
        @endauth
        <a class="btn-pink-green buy-tickets" href="/#buy-tickets">Buy Tickets</a>
        @auth
            <a
                @if (auth()->user()->role_id == 1) href="{{ route('admin.panel') }}"
                @else
                    href="{{ route('user.show', ['id' => auth()->user()->id]) }}" @endif>
                <img class="client-icon" src="{{ asset('medias/person-fill.png') }}" alt="Account">
            </a>
        @endauth
    </div>
</nav>

<nav class="nav-mobile">
    <div class="div-logo-brg">
        <div></div>
        <p class="logo">NOVA</p>
        <img id="burger-menu" src="{{ asset('medias/list.png') }}" alt="Menu">
    </div>
    <div class="div-nav-links" id="mobile-menu">
        <div class="upper-nav-mobile">
            <img id="close-menu" src="{{ asset('medias/x.png') }}" alt="Close Menu">
            @auth
                <a
                    @if (auth()->user()->role_id == 1) href="{{ route('admin.panel') }}"
                @else
                    href="{{ route('user.show', ['id' => auth()->user()->id]) }}" @endif>
                    <img class="client-icon" src="{{ asset('medias/person-fill.png') }}" alt="Account">
                </a>
            @else
                <a href="{{ route('loginOrRegister') }}"><img class="client-icon"
                        src="{{ asset('medias/person-fill.png') }}" alt="Account"></a>
            @endauth
            <a class="nav-links green-text" href="{{ route('home') }}">Home</a>
            <a class="nav-links blue-text" href="{{ route('activity.index') }}">Festival</a>
            <a class="nav-links purple-text" href="{{ route('article.index') }}">Articles</a>
            <a class="nav-links pink-text" href="/#footer">Contact</a>
            @auth
                <a class="btn-blue-pink btn-login-logout nav-mobile-log" href="{{ route('logout') }}">Logout</a>
            @else
                <a class="btn-blue-pink btn-login-logout nav-mobile-log" href="{{ route('loginOrRegister') }}">Login</a>
            @endauth
            <a class="btn-pink-green buy-tickets btn-nav-mobile" href="/#buy-tickets">Tickets</a>

        </div>
    </div>
</nav>
