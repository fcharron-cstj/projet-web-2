<main>
    <x-admin.layout>
        <div class="admin-panel-container">
            <div class="admin-panel">
                <h1>Welcome username !</h1>
                <div class="header">
                    <a href="#users">Users</a>
                    <a href="#articles">Articles</a>
                    <a href="#activities">Activities</a>
                </div>

                <section>
                    <h2 id="users">Users</h2>
                    <a href="">Add a new user</a>
                    @foreach ($users as $user)
                        @if ($user->role_id == 1)
                            <div class="admin">
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

                <section class="articles-admin">
                    @foreach ($articles as $article)
                        <article class="article-admin">
                            <p>{{ $article->title }}</p>
                            <p>{{ $article->description }}</p>
                            <p>{{ $article->date }}</p>
                            <img src="{{ $article->media }}" alt="">
                            <a href="{{ route('article.edit', ['id' => $article->id]) }}"
                                style="color:#44FFF9">Edit</a>
                            <form action="{{ route('article.destroy') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $article->id }}">
                                <button type="submit">Delete</button>
                            </form>
                        </article>
                    @endforeach
                </section>

                <section class="schedules-admin">
                    @foreach ($activities as $activity)
                        <div>
                            <p>{{ $activity->title }}</p>
                            <p>{{ $activity->hour }}</p>
                            <a href="{{ route('activity.edit', ['id' => $activity->id]) }}"
                                style="color:#44FFF9">EDIT</a>
                            <form action="{{ route('activity.destroy') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $activity->id }}">
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                    @endforeach
                </section>
            </div>
        </div>
    </x-admin.layout>
</main>
