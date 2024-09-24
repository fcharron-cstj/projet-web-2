<main>
    <x-layout>
        <section class="users">
            @foreach ($users as $user)
                @if ($user->role_id == 1)
                    <div class="admin">
                        <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                        <p>{{ $user->email }}</p>
                        <form action="{{ route('admin.edit') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit">Edit</button>
                        </form>
                        <form action="{{ route('admin.destroy') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                @endif

                @if ($user->role_id == 2)
                    <div class="user">
                        <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                        <p>{{ $user->email }}</p>
                        <form action="{{ route('admin.edit') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit">Edit</button>
                        </form>
                        <form action="{{ route('admin.destroy') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit">Delete</button>
                        </form>
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
                    <a href="{{ route('article.edit', ['id' => $article->id]) }}">Edit</a>
                    <form action="{{ route('article.destroy') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $article->id }}">
                        <button type="submit">Delete</button>
                    </form>
                </article>
            @endforeach
        </section>

        <section class="schedule">
            @foreach ($schedules as $schedule)
                <div>
                    <p>{{ $schedule->activity }}</p>
                    <p>{{ $schedule->date }}</p>
                    <form action="{{ route('schedule.edit') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $schedule->id }}">
                        <button type="submit">Edit</button>
                    </form>
                    <form action="{{ route('schedule.destroy') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $schedule->id }}">
                        <button type="submit">Delete</button>
                    </form>
                </div>
            @endforeach
        </section>
    </x-layout>


</main>
