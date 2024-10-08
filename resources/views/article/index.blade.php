<x-layout>
    <main id="article-page">
        <h1>Articles</h1>
        <section class="articles-list">
            <div class="articles-container">
                @foreach ($articles as $article)
                    <article>
                        <div class="article-overlay">
                            <h2>{{ $article->title }}</h2>
                                <p>{{ $article->description }}</p>
                                <p>{{ $article->date }}</p>
                                <a href="{{ route('article.show', ['id' => $article->id]) }}">Read more</a>
                        </div>
                        <img src="{{ asset($article->media) }}" alt="">
                    </article>
                @endforeach
            </div>
        </section>
    </main>
    <x-footer/>
</x-layout>
