<main>
    <h1>Update a schedule</h1>
    <div class="form">
        <form action="{{ route('schedule.update') }}" method="POST">

            @csrf

            <input type="hidden" name="id" value="{{ $schedule->id }}">

            <label for="title">Title</label>

            <input type="text" name="title" id="title" value="{{ old('title') }}">

            <label for="description">Description</label>

            <input type="text" name="description" id="description" value="{{ old('description') }}">

            <label for="date">Date</label>

            <input type="date" name="name" id="date" value="{{ old('date') }}">

            <label for="artists">Artists</label>

            <input type="text" name="artists" id="artists" value="{{ old('artists') }}">

            <button type="submit">Edit</button>
        </form>
    </div>
</main>
