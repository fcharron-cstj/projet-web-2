<x-layout>
    <main id="article-manage">
        <div class="article-form-container">
            <h2>Update an article</h2>
            <div class="form">
                <form action="{{ route('article.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-forms.error champ="id" />
                    <input type="hidden" name="id" value="{{ $article->id }}">
                    <div>
                        <label for="title">Title</label>
                        <x-forms.error champ="title" />
                        <input name="title" type="text" value="{{ old('title', $article->title) }}" />
                    </div>

                    <div>
                        <label for="description">Description</label>
                        <x-forms.error champ="description" />
                        <textarea name="description" rows="6">{{ old('description', $article->description) }}</textarea>
                    </div>

                    <div>
                        <label for="media">Image</label>
                        <x-forms.error champ="media" />
                        <input name="media" type="file">
                    </div>

                    <div>
                        <button type="submit" class="btn-green-pink">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layout>
