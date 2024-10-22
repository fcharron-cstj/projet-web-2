<x-layout>
    <header>
    </header>
    <main id="activity-manage">
        <div class="activity-form-container">
            <h2>Create a new activity</h2>
            <div class="form">
                <form action="{{ route('activity.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="title">Title</label>
                        <x-forms.error champ="title" />
                        <input name="title" type="text" autocomplete="title" value="{{ old('title') }}" />
                    </div>

                    <div>
                        <label for="artists">Artist(s)</label>
                        <x-forms.error champ="artists" />
                        <input name="artists" type="text" autocomplete="artists" value="{{ old('artists') }}">
                    </div>

                    <div class="date-time">
                        <label for="date">Date</label>
                        <x-forms.error champ="date" />
                        <select name="date">
                            @foreach ($days as $day)
                                <option value="{{ $day->id }}">
                                    {{ date('F jS Y', strtotime($day->date)) }}
                                </option>
                            @endforeach
                        </select>
                        <label for="hour">Hour</label>
                        <x-forms.error champ="hour" />
                        <input class="hour" type="time" name="hour" value="{{ old('hour') }}">
                    </div>

                    <div>
                        <label for="media">Image</label>
                        <x-forms.error champ="media" />
                        <input name="media" type="file">
                    </div>

                    <div>
                        <button type="submit" class="btn-green-pink">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layout>
