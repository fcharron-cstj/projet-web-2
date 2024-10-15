<x-layout>

    <!-- Displays success messages -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <main id="activity-manage">
        <div class="activity-form-container">
            <h2>Create a new article</h2>
            <div class="form">
                <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="title">Title</label>
                        <x-forms.error champ="title" />
                        <input id="title" name="title" type="text" autocomplete="title"
                            value="{{ old('title') }}" />
                    </div>

                    <div>
                        <label for="description">Description</label>
                        <x-forms.error champ="description" />
                        <input id="description" name="description" type="text" autocomplete="description"
                            value="{{ old('description') }}">
                    </div>

                    <div>
                        <label for="media">Image</label>
                        <x-forms.error champ="media" />
                        <input  id="image" name="media" type="file">
                    </div>

                    <div>
                        <button type="submit" class="btn-green-pink">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layout>
