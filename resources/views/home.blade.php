<x-layout>
    <header id="headerHome">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Displays error messages -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <video id="videoPlayer" poster="{{ asset('medias/poster.png') }}" loop muted>
            <source src="{{ asset('medias/nova.mp4') }}" type="video/mp4">
        </video>
        <button id="playPauseBtn" class="play-pause-btn">
            <i class="bi bi-play" id="playPauseIcon"></i>
        </button>
    </header>

    <div class="container">
        <section id="schedule">
            <h1 class="title-schedule">Music & arts festival</h1>
            <p class="text-schedule">A festival to discover new artists</p>
            <img src="" alt="">
            @foreach ($schedules as $schedule)
                <div class="schedule">
                    <p class="sub-title-schedule">{{ date_format(date_create($schedule->date), 'w F') }}</p>
                    <p class="text-schedule">{{ $schedule->activity }}</p>
                </div>
            @endforeach
            <a class="btn-green-pink" href="{{ route('article.index') }}">Articles</a>
            <a class="btn-blue-pink" href="#tickets" id="buy-tickets">Buy Tickets</a>
        </section>
        <img class="changingImg" src="{{ asset('medias/doodle_artist.jpg') }}" alt="doodle artist img">

        <section class="tickets">
            <h2 id="tickets">Tickets</h2>
            <div class="ticket-option 1">
                <p>General entry</p>
                <span class="ticket-add">+</span>
                <span class="ticket-add">-</span>
                <p>Access to the size and scenes</p>
                <p>25$</p>
            </div>
            <div class="ticket-option 2">
                <p>Da Vinci</p>
                <span class="ticket-add">+</span>
                <span class="ticket-add">-</span>
                <p>Welcome drink, surprise gift</p>
                <p>40$</p>
            </div>
            <div class="ticket-option 3">
                <p>VIP</p>
                <span class="ticket-add">+</span>
                <span class="ticket-add">-</span>
                <p>Open bar, Food, Seats in VIP lodge</p>
                <p>190$</p>
            </div>
            <div class="cart">
                <p>Total</p>
                <ul class="tickets-total">
                    <li>General entry 0x</li>
                    <li>Da Vinci 0x</li>
                    <li>VIP 0x</li>
                </ul>

                <p class="total-price">0$</p>

                <!-- Display of success messages -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- Display of error messages -->
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('reservation.store') }}" method="POST">
                    @csrf
                    <label for="arrival_date">Arrival Date: </label>
                    <x-forms.error champ="arrival_date" />
                    <input name="arrival_date" type="date" min="2025-04-04" max="2025-04-06">
                    <label for="leave_date">Leave Date: </label>
                    <x-forms.error champ="leave_date" />
                    <input name="leave_date" type="date" min="2025-04-04" max="2025-04-06">
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
                    <img src="{{ $article->media }}" alt="media of {{ $article->title }}">
                    <a href="{{ route('article.show', ['id' => $article->id]) }}">More info</a>
                </article>
            @endforeach
            <a href="{{ route('article.index') }}">View all articles</a>
        </section>
    </div>
    <x-footer />
    <script src="{{ asset('js/reservations.js') }}"></script>
</x-layout>
