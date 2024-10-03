<x-layout>
    <main>
        <section class="articles">
            <div class="article-container">
                @foreach ($articles as $article)
                    <article class="schedule">
                        <div class="article-overlay">
                            <h2>{{ $article->title }}</p>
                            <p>{{ $article->description }}</p>
                            <p>{{ $article->date }}</p>
                            <a href="{{ route('article.show', ['id' => $article->id]) }}">Read more</a>
                        </div>
                        <img src="{{ $article->media }}" alt="">
                    </article>
                @endforeach
            </div>
        </section>
    </main>
</x-layout>
