<nav class="nav-mobile">

</nav>

<nav class="nav-desktop">
    <div class="div-logo">
        <p class="logo">NOVA</p>
    </div>
    <div class="div-nav-links">
        <a class="nav-links green-text" href="#">Home</a>
        <a class="nav-links blue-text" href="#">Festival</a>
        <a class="nav-links purple-text" href="">Articles</a>
        <a class="nav-links pink-text" href="#">Contact</a>
        @auth
        <a class="btn-blue-pink" href="{{ route('logout') }}">Logout</a>
        @else
        <a class="btn-blue-pink" href="{{ route('login') }}">Login</a>
        @endauth
        <a class="btn-pink-green" href="#">Buy Tickets</a>
    </div>
</nav>

<nav class="nav-mobile">
    <div class="div-logo-brg">
        <p class="logo">NOVA</p>
        <img src="{{asset("medias/list.png")}}" alt="">
    </div>

    <div class="div-nav-links">
        <div class="upper-nav-mobile">
            <a class="nav-links green-text" href="">Home</a>
            <a class="nav-links blue-text" href="">Festival</a>
            <a class="nav-links purple-text" href="">Articles</a>
            <a class="nav-links pink-text" href="">Contact</a>
        </div>
        <div class="lower-nav-btn">
            <a class="btn-blue-pink" href="">Login</a>
        </div>
    </div>
</nav>