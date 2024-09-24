<x-layout>
    <main>
        <article>
            <div class="article">
                <p>{{ $article->title }}</p>
                <p>{{ $article->description }}</p>
                <p>{{ $article->date }}</p>
                <img src="{{ $article->media }}" alt="">
            </div>
        </article>
    </main>
</x-layout>
