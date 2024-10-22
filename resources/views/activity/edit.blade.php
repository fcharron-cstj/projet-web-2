<x-layout>
    <header>
    </header>

    <main id="activity-manage">
        <div class="activity-form-container">
            <h2>Update the activity: {{ $activity->title }}</h2>
            <div class="form">
                <form action="{{ route('activity.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $activity->id }}">

                    <div>
                        <label for="title">Title</label>
                        <x-forms.error champ="title" />
                        <input id="title" name="title" type="text" autocomplete="title"
                            value="{{ $activity->title }}" />
                    </div>

                    <div>
                        <label for="artists">Artist(s)</label>
                        <x-forms.error champ="artists" />
                        <input id="artists" name="artists" type="text" autocomplete="artists"
                            value="{{ $activity->artists }}">
                    </div>
                    <div class="date-time">
                        <label for="date">Date :</label>
                        <x-forms.error champ="date" />
                        <select name="date">
                            @foreach ($days as $day)
                                <option value="{{ $day->id }}"
                                    @if ($day->id == $activity->Day[0]->id) {{ 'selected' }} @endif>
                                    {{ date('F jS Y', strtotime($day->date)) }}
                                </option>
                            @endforeach
                        </select>
                        <label for="hour">Hour :</label>
                        <x-forms.error champ="hour" />
                        <input class="hour" type="time" name="hour"
                            value="{{ date_format(date_create($activity->date), 'H:i') }}">
                    </div>

                    <div>
                        <label for="media">Image</label>
                        <x-forms.error champ="media" />
                        <input id="media" name="media" type="file" style="color: aqua">
                    </div>

                    <div>
                        <button type="submit" class="btn-blue-pink" >Update</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layout>
