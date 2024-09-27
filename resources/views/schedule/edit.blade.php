<main>
    <h1>Update a schedule</h1>
    <div class="form">
        <form action="{{ route('schedules.update') }}" method="POST">

            @csrf

            <x-forms.error champ="id"/>
            <input type="hidden" name="id" value="{{ $schedule->id }}">


            <label for="activity">activity</label>

            <x-forms.error champ="activity"/>
            <input type="text" name="activity" id="activity" value="{{ $schedule->activity }}">

            <label for="date">Date</label>

            <x-forms.error champ="name"/>
            <input type="date" name="name" id="date"
                value="{{ date_format(date_create($schedule->date), 'Y-m-d') }}">

            <label for="artists">Artists</label>

            <x-forms.error champ="artist"/>
            <select name="artist" id="artist">
                @foreach ( $artists as $artist )
                    <option value="{{$artist->id}}">{{$artist->name}}</option>
                @endforeach
            </select>

            <button type="submit">Edit</button>
        </form>
    </div>
</main>
