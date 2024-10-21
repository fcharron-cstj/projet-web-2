<x-layout>
    <header id="headerHome">
        <video id="videoPlayer" poster="{{ asset('medias/poster.png') }}" loop muted>
            <source src="{{ asset('medias/nova.mp4') }}" type="video/mp4">
        </video>

        <button id="playPauseBtn" class="play-pause-btn">
            <i class="bi bi-play" id="playPauseIcon"></i>
        </button>
    </header>

    <div class="container">
        <section id="schedule">
            <div>
                <h1 class="title-schedule">Music & arts festival<br>Schedule</h1>
                <p class="text-schedule">A festival to discover new artists</p>
                <img class="changing-img-desktop" src="{{ asset('medias/doodle_artist.jpg') }}" alt="doodle artist img">
                <div id="btn-schedule-desktop">
                    <a class="btn-green-pink" href="{{ route('article.index') }}">Articles</a>
                    <a class="btn-blue-pink" href="#tickets" id="buy-tickets">Buy Tickets</a>
                </div>
            </div>
            <div>
                @foreach ($days as $day)
                    <div class="schedule">
                        <p class="sub-title-schedule">{{ date_format(date_create($day->date), 'w F') }}</p>

                        <p class="text-schedule">
                            @foreach ($day->Activity as $activity)
                                {{ $activity->artists . ' -' }}
                            @endforeach
                        </p>
                    </div>
                @endforeach
                <div id="btn-schedule-mobile">
                    <a class="btn-green-pink" href="{{ route('article.index') }}">Articles</a>
                    <a class="btn-blue-pink" href="#tickets" id="buy-tickets">Buy Tickets</a>
                </div>
            </div>
        </section>
        <img class="changing-img-mobile" src="{{ asset('medias/doodle_artist.jpg') }}" alt="doodle artist img">

        <section class="tickets">
            <h2 id="tickets">Tickets</h2>
            <div id="tickets-container">
                <div class="ticket-option-1 ticket-option">
                    <div>
                        <p class="ticket-title">General Entry</p>
                        <div>
                            <span class="ticket-add" data-option="1">-</span>
                            <span class="ticket-count" data-option="1">0</span> <!-- Ticket count -->
                            <span class="ticket-add" data-option="1">+</span>
                        </div>
                    </div>
                    <div class="lower-ticket-section">
                        <p>Access to the site and scenes</p>
                        <p>25$</p>
                    </div>
                </div>

                <div class="ticket-option-2 ticket-option">
                    <div>
                        <p class="ticket-title">Da Vinci</p>
                        <div>
                            <span class="ticket-add" data-option="2">-</span>
                            <span class="ticket-count" data-option="2">0</span> <!-- Ticket count -->
                            <span class="ticket-add" data-option="2">+</span>
                        </div>
                    </div>
                    <div class="lower-ticket-section">
                        <p>Welcome drink, surprise gift</p>
                        <p>40$</p>
                    </div>
                </div>

                <div class="ticket-option-3 ticket-option">
                    <div>
                        <p class="ticket-title">VIP</p>
                        <div>
                            <span class="ticket-add" data-option="3">-</span>
                            <span class="ticket-count" data-option="3">0</span> <!-- Ticket count -->
                            <span class="ticket-add" data-option="3">+</span>
                        </div>
                    </div>
                    <div class="lower-ticket-section">
                        <p>Open bar, Food, Seats in VIP lodge</p>
                        <p>190$</p>
                    </div>
                </div>
            </div>

            <div class="cart">
                <div id="form-tickets">
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

                        <div id="calendar">
                            <label for="arrival_date">Arrival Date: </label>
                            <x-forms.error champ="arrival_date" />
                            <input type="text" id="arrival_date" name="arrival_date" autocomplete="off"
                                class="calendar arrival">
                            <label for="leave_date">Leave Date: </label>
                            <x-forms.error champ="leave_date" />
                            <input type="text" id="leave_date" name="leave_date" autocomplete="off"
                                class="calendar leave">
                        </div>

                        <input type="hidden" name="bought_tickets_1" value="0" id="bought-tickets-1">
                        <input type="hidden" name="bought_tickets_2" value="0" id="bought-tickets-2">
                        <input type="hidden" name="bought_tickets_3" value="0" id="bought-tickets-3">
                        <button type="submit">Purchase Tickets</button>
                    </form>
                </div>
                <div id="ticket-total">
                    <p class="base-price">Tickets cost : </p>
                    <p class="extra-price">days extra </p>
                    <p>Total : &nbsp; </p>
                    <p class="total-price">0$</p>
                </div>
            </div>
        </section>
        <section id="article-home-page" class="articles">
            <h2>Articles</h2>
            <div class="home-article-container">
                @foreach ($articles as $article)
                    <article class="home-article">
                        <img src="{{ $article->media }}" alt="media of {{ $article->title }}">
                        <div class="article-overlay">
                            <h3>{{ $article->title }}</h3>
                            @if (strlen($article->description) > 25)
                                <p>
                                    {{ substr($article->description, 0, 25) }}...
                                </p>
                            @else
                                <p>
                                    {{ substr($article->description, 0, 25) }}
                                </p>
                            @endif
                            <a href="{{ route('article.show', ['id' => $article->id]) }}">Read more</a>
                        </div>
                    </article>
                @endforeach
            </div>
            <div id="btn-see-all-articles">
                <a href="{{ route('article.index') }}" class="btn-blue-pink btn-articles">View all articles</a>
            </div>
        </section>
    </div>
    <x-footer />
    <script src="{{ asset('js/reservations.js') }}"></script>
    <script src="{{ asset('js/changingImage.js') }}"></script>
    <script src="{{ asset('js/video.js') }}"></script>
    <script type="module" src="{{ asset('js/reservations.js') }}"></script>
    @vite('resources/js/calendar.js')
</x-layout>
