<x-layout>
    <main>
        <section class="articles">
            @foreach ($articles as $article)
                <article class="schedule">
                    <p>{{ $article->title }}</p>
                    <p>{{ $article->description }}</p>
                    <p>{{ $article->date }}</p>
                    <img src="{{ $article->media }}" alt="">
                </article>
            @endforeach
        </section>
    </main>
</x-layout>
