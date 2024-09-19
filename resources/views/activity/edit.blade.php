<main>
    <h1>Update an activity</h1>
    <div class="form">
        <form action="{{ route('activity.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{ $activity->id }}">

            <label for="title">Title</label>

            <input type="text" name="title" id="title" value="{{ old('title') }}">


            <label for="description">Description</label>

            <input type="text" name="description" id="description" value="{{ old('description') }}">

            <label for="date">Date</label>

            <input type="date" name="name" id="date" value="{{ old('date') }}">

            <button type="submit">Edit</button>
        </form>
    </div>
</main>
