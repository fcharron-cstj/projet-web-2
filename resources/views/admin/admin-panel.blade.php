<main>
    <x-layout>
        <section class="users">
            @foreach ($users as $user)
                @if ($user->role_id == 1)
                    <div class="admin">
                        <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                        <p>{{ $user->email }}</p>
                        <a href="{{ route('admin.edit', ['id' => $user->id]) }}">Edit</a>
                        <a href="{{ route('admin.destroy', ['id' => $user->id]) }}">Delete</a>
                    </div>
                @endif

                @if ($user->role_id == 2)
                    <div class="user">
                        <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                        <p>{{ $user->email }}</p>
                        <a href="{{ route('admin.edit', ['id' => $user->id]) }}">Edit</a>
                        <a href="{{ route('admin.destroy', ['id' => $user->id]) }}">Delete</a>
                    </div>
                @endif
            @endforeach
        </section>

        <section class="articles">
            @foreach ($articles as $article)
                <article>
                    <p>{{ $article->title }}</p>
                    <p>{{ $article->description }}</p>
                    <p>{{ $article->date }}</p>
                    <img src="{{ $article->media }}" alt="">
                    <a href="{{ route('article.edit', ['id' => $user->id]) }}">Edit</a>
                    <a href="{{ route('article.destroy', ['id' => $user->id]) }}">Delete</a>
                </article>
        </section>

        <section class="schedule">
            @foreach ($schedules as $schedule)
                <div>
                    <p>{{ $schedule->activity }}</p>
                    <p>{{ $schedule->date }}</p>
                    <a href="{{ route('schedule.edit', ['id' => $user->id]) }}">Edit</a>
                    <a href="{{ route('schedule.destroy', ['id' => $user->id]) }}">Delete</a>
                </div>
        </section>
    </x-layout>


</main>
