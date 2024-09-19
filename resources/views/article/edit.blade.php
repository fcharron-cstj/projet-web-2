<main>
    <h1>Update an article</h1>
    <div class="form">
        <form action="{{ route('article.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{ $article->id }}">

            <label for="title">Title</label>

            <input type="text" name="title" id="title" value="{{ old('title') }}">


            <label for="description">Description</label>

            <input type="text" name="description" id="description" value="{{ old('description') }}">

            <label for="image">Image</label>

            <input id="image" name="image" type="file" value="{{ old('image') }}">

            <button type="submit">Edit</button>
        </form>
    </div>
</main>
