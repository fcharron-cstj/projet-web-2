<x-layout>
    <main>
        <section class="activity">
            <div class="activity-container">
                <h1>Festival</h1>
                <div class="arrow-container">
                    <p class="arrow" id="left-arrow">
                        &larr;
                    </p>
                    <p class="arrow" id="right-arrow">
                        &rarr;
                    </p>
                </div>
                @foreach ($days as $day)
                    <div class="day-information" id="day-{{ $day->id }}">
                        <div class="activity-day">
                            <p id="day-of-week">
                                {{ date('l', strtotime($day->date)) }}
                            </p>
                            <p>
                                - {{ date('d', strtotime($day->date)) }} of {{ date('F', strtotime($day->date)) }}
                            </p>
                        </div>
                        @foreach ($activities as $activity)
                            @if (date('d', strtotime($activity->date)) == date('d', strtotime($day->date)))
                                <article>

                                    <img src="{{ $activity->media }}" alt="Media of {{ $activity->title }}">
                                    <div class="activity-info-container">
                                        <span>
                                            <p>{{ $activity->artists }}</p>
                                            <p>- {{ $activity->title }}</p>
                                        </span>
                                        <p>
                                            {{ date('H', strtotime($activity->date)) }}h</p>
                                    </div>
                                </article>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </section>
    </main>
    <script src="{{ asset('js/activity.js') }}"></script>
    <x-footer />
</x-layout>
