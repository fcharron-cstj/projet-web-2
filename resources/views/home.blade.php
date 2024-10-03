<x-layout>
    <header id="headerHome">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
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
            <div>
                <h1 class="title-schedule">Music & arts festival</h1>
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
                <div id="ticket-total">
                    <p>Total : &nbsp; </p>
                    <p class="total-price">0$</p>
                </div>
            </div>
        </section>
        <section class="articles">
            <h2>Articles</h2>
            <div class="article-container">
                @foreach ($articles as $article)
                    <article>
                        <img src="{{ $article->media }}" alt="media of {{ $article->title }}">
                        <div class="article-overlay">
                            <h3>{{ $article->title }}</h3>
                            <p>{{ $article->description }}</p>
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
</x-layout>
