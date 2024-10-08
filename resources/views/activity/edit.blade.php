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
            <h2>Create a new activity</h2>
            <div class="form">
                <form action="{{ route('activity.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="title">Title</label>
                        <x-forms.error champ="title" />
                        <input id="title" name="title" type="text" autocomplete="title"
                            value="{{ old('title') }}" />
                    </div>

                    <div>
                        <label for="artists">Artist(s)</label>
                        <x-forms.error champ="artists" />
                        <input id="artists" name="artists" type="text" autocomplete="artists"
                            value="{{ old('artists') }}">
                    </div>

                    <div>
                        <label for="hour">Date</label>
                        <x-forms.error champ="hour" />
                        <input id="hour" name="hour" type="datetime-local" value="{{ old('hour') }}">
                    </div>

                    <div>
                        <label for="media">Image</label>
                        <x-forms.error champ="media" />
                        <input  id="media" name="media" type="file">
                    </div>

                    <div>
                        <button type="submit" class="btn-green-pink">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layout>
