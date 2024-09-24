<x-layout>

    {{-- REMOVE - for testing --}}
    <a href="{{ route('logout') }}">Log out</a>
    {{-- REMOVE --}}

    <div class="container">

        <section class="schedule">
            @foreach ($schedules as $schedule)
                <div class="schedule">
                    <p>{{ $schedule->activity }}</p>
                    <p>{{ $schedule->date }}</p>
                </div>
            @endforeach
        </section>
        <section class="tickets">
            <div class="ticket-option">
                <p>General entry</p>
                <p>Access to the size and scenes</p>
                <p>25$</p>
            </div>
            <div class="ticket-option">
                <p>Da Vinci</p>
                <p>Welcome drink, surprise gift</p>
                <p>40$</p>
            </div>
            <div class="ticket-option">
                <p>VIP</p>
                <p>Open bar, Food, Seats in VIP lodge</p>
                <p>190$</p>
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
</x-layout>
