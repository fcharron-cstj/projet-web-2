<main>
    <x-layout>
        <section class="users">
            @foreach ($users as $user)
                @if ($user->role_id == 1)
                    <div class="admin">
                        {{-- For testing --}}
                        {{--  <p>
                            <a href="{{route('user.show', ['id' => $user->id])}}" style="text-decoration: none; cursor: pointer; color:#44FFF9">
                                {{ $user->first_name }} {{ $user->last_name }}
                            </a>
                        </p> --}}
                        <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                        <p>{{ $user->email }}</p>
                        <a href="{{ route('admin.edit', ['id' => $user->id]) }}" style="color:#44FFF9">EDIT</a>
                        <form action="{{ route('admin.destroy') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                @endif

                @if ($user->role_id == 2)
                    <div class="user">
                        {{-- For testing --}}
                        {{-- <p>
                            <a href="{{route('user.show', ['id' => $user->id])}}" style="text-decoration: none; cursor: pointer; color:#44FFF9">
                                {{ $user->first_name }} {{ $user->last_name }}
                            </a>
                        </p> --}}
                        <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                        <p>{{ $user->email }}</p>
                        <a href="{{ route('admin.edit', ['id' => $user->id]) }}" style="color:#44FFF9">EDIT</a>
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
                    <a href="{{ route('article.edit', ['id' => $article->id]) }}" style="color:#44FFF9">Edit</a>
                    <form action="{{ route('article.destroy') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $article->id }}">
                        <button type="submit">Delete</button>
                    </form>
                </article>
            @endforeach
        </section>

        <section class="schedule">
            @foreach ($activities as $activity)
                <div>
                    <p>{{ $activity->title }}</p>
                    <p>{{ $activity->hour }}</p>
                    <a href="{{ route('activity.edit', ['id' => $activity->id]) }}" style="color:#44FFF9">EDIT</a>
                    <form action="{{ route('activity.destroy') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $activity->id }}">
                        <button type="submit">Delete</button>
                    </form>
                </div>
            @endforeach
        </section>
    </x-layout>


</main>
