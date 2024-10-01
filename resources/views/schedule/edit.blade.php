<x-forms.layout>

    <main>
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
        <div class="schedule-container">
            <div class="form-container schedule">
                <h2>Edit a schedule</h2>
                <div class="form">
                    <form action="{{ route('schedules.update') }}" method="POST">
                        @csrf
                        <label for="activity">activity</label>
                        <x-forms.error champ="activity" />
                        <input type="text" name="activity" id="activity" value="{{ old('activity') ?? $schedule->activity}}">
                        <label for="date">Date</label>
                        <x-forms.error champ="date" />
                        <input type="date" name="date" id="date" value="{{ old('date') ?? $schedule->date}}">
                        <label for="artists">Artists</label>
                        <x-forms.error champ="artist" />
                        <select name="artist" id="artist">
                            @foreach ($artists as $artist)
                                <option value="{{ $artist->id }}" {{ $schedule->artists->contains($artist->id) ? 'selected' : '' }} >{{$artist->name}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn-green-pink">Create</button>
                    </form>
                </div>
            </div>
            <div class="form-container schedule">
                <div class="form">
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
                        <button type="submit" class="btn-green-pink"> Add </button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <div class="form">
        <form action="{{ route('schedules.update') }}" method="POST">

            @csrf

            <x-forms.error champ="id" />
            <input type="hidden" name="id" value="{{ $schedule->id }}">


            <label for="activity">activity</label>

            <x-forms.error champ="activity" />
            <input type="text" name="activity" id="activity" value="{{ $schedule->activity }}">

            <label for="date">Date</label>

            <x-forms.error champ="name" />
            <input type="date" name="name" id="date"
                value="{{ date_format(date_create($schedule->date), 'Y-m-d') }}">

            <label for="artists">Artists</label>

            <x-forms.error champ="artist" />
            <select name="artist" id="artist">
                @foreach ($artists as $artist)
                    <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                @endforeach
            </select>

            <button type="submit">Edit</button>
        </form>
    </div>
</main>
