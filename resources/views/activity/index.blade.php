<x-layout>
    <main>
        <section class="activity">
            <div class="activity-container">
                <h1>Festival</h1>

                @foreach ($days as $day)
                    @if ($day->id == $days[1]->id)
                        <div class="day-information">
                            <p id="day-of-week">
                                {{ date('l', strtotime($day->date)) }}
                            </p>
                            <div class="day">
                                <p class="arrow">
                                    &larr;
                                </p>
                                <p>
                                    {{ date('d', strtotime($day->date)) }} of {{ date('M', strtotime($day->date)) }}
                                </p>
                                <p class="arrow">
                                    &rarr;
                                </p>
                            </div>
                        </div>
                        @foreach ($activities as $activity)
                            <a href="{{ route('activity.show', ['id' => $activity->id]) }}">
                                <article>
                                    <img src="{{ $activity->media }}" alt="Media of {{ $activity->artists }}">
                                    <div class="activity-info-container">
                                        <span>
                                            <p>{{ $activity->artists }}</p>
                                            <p>- {{ $activity->title }}</p>
                                        </span>
                                        <p @if ($activity->id % 2 == 0) style="color: #8C52FF" @endif>
                                            {{ date('H', strtotime($activity->date)) }}h</p>
                                    </div>
                                </article>
                            </a>
                        @endforeach
                        <a href="#" class="read-more">
                            Read More..
                        </a>
                    @endif
                @endforeach
            </div>

        </section>
    </main>
</x-layout>
