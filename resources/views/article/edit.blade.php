<main>
    <h1>Update an article</h1>
    <div class="form">
        <form action="{{ route('article.update') }}" method="POST" enctype="multipart/form-data">
            @csrf


            <x-forms.error champ="id"/>
            <input type="hidden" name="id" value="{{ $article->id }}">

            <label for="title">Title</label>

            <x-forms.error champ="title"/>
            <input type="text" name="title" id="title" value="{{ $article->title }}">


            <label for="description">Description</label>

            <x-forms.error champ="description"/>
            <input type="text" name="description" id="description" value="{{ $article->description }}">

            <label for="image">Image</label>

            <x-forms.error champ="image"/>
            <input id="image" name="image" type="file" value="{{ old('image') }}">

            <button type="submit">Edit</button>
        </form>
    </div>
</main>
