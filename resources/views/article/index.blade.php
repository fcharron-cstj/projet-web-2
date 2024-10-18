<x-layout>
    <main id="article-page">
        <h1 id="h1-articles">Articles</h1>
        <section class="article-container">
            @foreach ($articles as $article)
                <article>
                    <div class="article-overlay">
                        <div>
                            <h2>
                                {{ $article->title }}
                            </h2>
                        </div>
                        <div>
                            <p>
                                {{ substr($article->description, 0, 25) }}
                                @if (strlen($article->description) > 25)
                                    {{ '...' }}
                                @endif
                            </p>
                        </div>

                        <div>
                            <a href="{{ route('article.show', ['id' => $article->id]) }}">
                                Read more
                            </a>
                        </div>
                    </div>
                    <img src="{{ asset($article->media) }}" alt="Media of {{ $article->title }}">
                </article>
            @endforeach
        </section>
    </main>
    <x-footer />
</x-layout>
