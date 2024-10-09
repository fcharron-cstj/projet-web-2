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
            <h2>Update the activity: {{$activity->title}}</h2>
            <div class="form">
                <form action="{{ route('activity.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$activity->id}}">

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

                    <div>
                        <label for="date">Date</label>
                        <x-forms.error champ="date" />
                        <input id="date" name="date" type="datetime-local" value="{{ $activity->date }}">
                    </div>

                    <div>
                        <label for="media">Image</label>
                        <x-forms.error champ="media" />
                        <input  id="media" name="media" type="file">
                    </div>

                    <div>
                        <button type="submit" class="btn-green-pink">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layout>
