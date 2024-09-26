<x-layout>

    {{-- REMOVE - for testing --}}
    <a href="{{ route('logout') }}">Log out</a>
    {{-- REMOVE --}}

    <header id="headerHome">
        <video id="videoPlayer" loop autoplay muted>
            <source src="{{ asset('medias/nova.mp4') }}" type="video/mp4">
        </video>
    </header>
    <div class="container">
        <section id="schedule">
            <h1 class="title">Music & arts festival</h1>
            <p class="text">A festival to discover new artists</p>
            <img src="" alt="">
            @foreach ($schedules as $schedule)
                <div class="schedule">
                    <p class="sub-title">{{ date_format(date_create($schedule->date), 'w F') }}</p>
                    <p class="text">{{ $schedule->activity }}</p>
                </div>
            @endforeach
            <a class="btn-green-pink" href="{{ route('article.index') }}">Articles</a>
            <a class="btn-blue-pink" href="#tickets">Buy Tickets</a>
        </section>
        <section class="tickets">
            <h2 id="tickets">Tickets</h2>
            <div class="ticket-option 1">
                <p>General entry</p>
                <p>Access to the size and scenes</p>
                <p>25$</p>
                <span class="ticket-add">+</span>
            </div>
            <div class="ticket-option 2">
                <p>Da Vinci</p>
                <p>Welcome drink, surprise gift</p>
                <p>40$</p>
                <span class="ticket-add">+</span>
            </div>
            <div class="ticket-option 3">
                <p>VIP</p>
                <p>Open bar, Food, Seats in VIP lodge</p>
                <p>190$</p>
                <span class="ticket-add">+</span>
            </div>
            <div class="cart">
                <p>Total</p>
                <ul class="tickets-total">
                    <li>General entry 0x</li>
                    <li>Da Vinci 0x</li>
                    <li>VIP 0x</li>
                </ul>
                <p class="total-price">0$</p>
                <form action="{{ route('reservation.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="bought_tickets_1" value="" id="bought-tickets-1">
                    <input type="hidden" name="bought_tickets_2" value="" id="bought-tickets-2">
                    <input type="hidden" name="bought_tickets_3" value="" id="bought-tickets-3">
                    <button type="submit">Purchase Tickets</button>
                </form>
            </div>
        </section>
        <section class="articles">
            @foreach ($articles as $article)
                <article>
                    <p>{{ $article->title }}</p>
                    <p>{{ $article->description }}</p>
                    <p>{{ $article->date }}</p>
                    <img src="{{ $article->media }}" alt="">
                    <a href="{{ route('article.show', ['id' => $article->id]) }}">More info</a>
                </article>
            @endforeach
            <a href="{{ route('article.index') }}">View all articles</a>
        </section>
    </div>
    <x-footer />
    <script src="{{ asset('js/reservations.js') }}"></script>
</x-layout>
