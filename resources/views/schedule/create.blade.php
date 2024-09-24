<main>
    <h1>Create a schedule</h1>
    <div class="form">
        <form action="{{ route('activity.store') }}" method="POST">
            @csrf

            <label for="activity">activity</label>

            <input type="text" name="activity" id="activity" value="{{ old('activity') }}">

            <label for="date">Date</label>

            <input type="date" name="name" id="date" value="{{ old('date') }}">

            <label for="artists">Artists</label>

            <input type="text" name="artists" id="artists">

            <button type="submit">Create</button>
        </form>
    </div>
</main>
