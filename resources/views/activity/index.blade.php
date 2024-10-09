<x-layout>
    <main>
        <section class="activity">
            <div class="activity-container">
                <h1>Festival</h1>

                @foreach ($days as $day)
                    <div class="day-information">
                        <p id="day-of-week">
                            {{ date('l', strtotime($day->date)) }}
                        </p>
                        <div class="activity-day">
                            <p class="arrow" id="left-arrow"
                                data-date="{{ date('Y-m-d', strtotime($day->date . ' -1 day')) }}">
                                &larr;
                            </p>
                            <p>
                                - {{ date('d', strtotime($day->date)) }} of {{ date('F', strtotime($day->date)) }}
                            </p>
                            <p class="arrow" id="right-arrow"
                                data-date="{{ date('Y-m-d', strtotime($day->date . ' +1 day')) }}">
                                &rarr;
                            </p>
                        </div>
                        @foreach ($activities as $activity)
                       {{--  @if ($activity->id == 37)
                            @dd($activity->media)
                        @endif --}}
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
    <x-footer/>
</x-layout>
