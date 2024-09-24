<main>
    <h1>Update a schedule</h1>
    <div class="form">
        <form action="{{ route('schedule.update') }}" method="POST">

            @csrf

            <input type="hidden" name="id" value="{{ $schedule->id }}">


            <label for="activity">activity</label>

            <input type="text" name="activity" id="activity" value="{{ $schedule->activity }}">

            <label for="date">Date</label>

            <input type="date" name="name" id="date"
                value="{{ date_format(date_create($schedule->date), 'Y-m-d') }}">

            <label for="artists">Artists</label>

            <input type="text" name="artists" id="artists">

            <button type="submit">Edit</button>
        </form>
    </div>
</main>
