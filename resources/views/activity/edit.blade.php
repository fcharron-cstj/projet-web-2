<x-layout>
    <header>
    </header>

    <!-- Displays success messages -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <main id="activity-manage">
        <div class="activity-form-container">
            <h2>Update an activity</h2>
            <div class="form">
                <form action="{{ route('activity.update') }}" method="POST">
                    @csrf
                    <div>
                        <label for="title">Title</label>
                        <x-forms.error champ="title" />
                        <input id="title" name="title" type="text" autocomplete="title"
                            value="{{$activity->title}}" />
                    </div>

                    <div>
                        <label for="artist">Artist</label>
                        <x-forms.error champ="artist" />
                        <input id="artist" name="artist" type="text" autocomplete="artist"
                            value="{{ $activity->artists }}">
                    </div>

                    <div>
                        <label for="date">Date</label>
                        <x-forms.error champ="date" />
                        <input id="date" name="date" type="date" value="{{ $activity->date }}">
                    </div>

                    <div>
                        <button type="submit" class="btn-green-pink">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layout>
