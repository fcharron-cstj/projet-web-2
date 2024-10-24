<x-layout title="Article">
    <main id="article-show-page">
        <h1 id="h1-articles">Article</h1>
        <article>
            <div class="article">
                <img id="article-media-desktop" src="{{ asset($article->media) }}" alt="Media of {{ $article->title }}">
                <div>
                    <h2>{{ $article->title }}</h2>
                    <h3>{{ $article->created_at->format('F j, Y') }}</h3>
                    <p>{{ $article->description }}</p>
                    <img id="article-media-mobile" src="{{ asset($article->media) }}" alt="Media of {{ $article->title }}">
                </div>
            </div>
        </article>
    </main>
    <x-footer/>
</x-layout>
