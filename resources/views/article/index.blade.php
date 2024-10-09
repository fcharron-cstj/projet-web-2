<x-layout>
    <main id="article-page">
        <h1>Articles</h1>
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
                            @if (strlen($article->description) > 25)
                                <p>
                                    {{ substr($article->description, 0, 25) }}...
                                </p>
                            @else
                                <p>
                                    {{ substr($article->description, 0, 25) }}
                                </p>
                            @endif
                        </div>
                        {{-- <p>
                            {{ date('d',strtotime($article->created_at)) }}
                            {{ date('M',strtotime($article->created_at)) }}
                            {{ date('Y',strtotime($article->created_at)) }}
                        </p> --}}
                        <div>
                            <a href="{{ route('article.show', ['id' => $article->id]) }}">
                                Read more
                            </a>
                        </div>
                    </div>
                    <img src="{{ asset($article->media) }}" alt="Media of {{$article->title}}">
                </article>
            @endforeach
        </section>
    </main>
    <x-footer />
</x-layout>
