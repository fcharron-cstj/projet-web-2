<main>
    <h1>Create an article</h1>
    <div class="form">
        <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="title">Title</label>

            <input type="text" name="title" id="title" value="{{ old('title') }}">


            <label for="description">Description</label>

            <input type="text" name="description" id="description" value="{{ old('description') }}">

            <label for="image">Image</label>

            <input id="image" name="image" type="file" value="{{ old('image') }}">

            <button type="submit">Create</button>
        </form>
    </div>
</main>
