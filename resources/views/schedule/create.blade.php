<main>
    <h1>Create a schedule</h1>
    <!-- Display of success messages -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="form">
        <form action="{{ route('schedules.store') }}" method="POST">
            @csrf

            <label for="activity">activity</label>

            <x-forms.error champ="activity" />
            <input type="text" name="activity" id="activity" value="{{ old('activity') }}">

            <label for="date">Date</label>
            <x-forms.error champ="date" />
            <input type="date" name="date" id="date" value="{{ old('date') }}">

            <label for="artists">Artists</label>

            <x-forms.error champ="artist" />
            <select name="artist" id="artist">
                @foreach ($artists as $artist)
                    <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                @endforeach
            </select>

            <button type="submit">Create</button>
        </form>

        <h2>Add a new artist</h2>
        @if (session('success_adding_artist'))
            <p>
                {{ session('success_adding_artist') }}
            </p>
        @endif
        <form action="{{ route('artist.store') }}" method="POST">
            @csrf
            <x-forms.error champ="name" />
            <input type="text" name="name" id="name" placeholder="New artist">
            <input type="submit" value="Add new artist">
        </form>
    </div>
</main>
