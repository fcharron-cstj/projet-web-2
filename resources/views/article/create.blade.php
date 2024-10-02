<main>
    <h1>Create an article</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="form">
        <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="title">Title</label>

            <x-forms.error champ="title" />
            <input type="text" name="title" id="title" value="{{ old('title') }}">


            <label for="description">Description</label>

            <x-forms.error champ="description" />
            <input type="text" name="description" id="description" value="{{ old('description') }}">

            <label for="image">Image</label>

            <x-forms.error champ="image" />
            <input id="image" name="image" type="file" value="{{ old('image') }}">

            <button type="submit">Create</button>
        </form>
    </div>
</main>
