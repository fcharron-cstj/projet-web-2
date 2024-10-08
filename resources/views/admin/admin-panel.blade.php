<main>
    <x-admin.layout>
        <div class="admin-panel-container">
            <div class="admin-panel">
                <h1>Welcome {{ auth()->user()->first_name }} !</h1>
                <div class="header">
                    <a href="#users">Users</a>
                    <a href="#articles">Articles</a>
                    <a href="#activities">Activities</a>
                </div>

                <section class="users-admin users">
                    <div class="top-bar">
                        <h2 id="users">Users</h2>
                        <a href="{{ route('admin.create') }}">Add a new user</a>
                    </div>
                    <div class="content-container">
                        @foreach ($users as $user)
                            @if ($user->role_id == 1)
                                <div class="admin content">
                                    <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                                    <p>{{ $user->email }}</p>
                                    <div class="buttons"> <a href="{{ route('admin.edit', ['id' => $user->id]) }}"
                                            class="edit-btn"><img src="{{ asset('medias/admin-edit.svg') }}"
                                                alt="edit"></a>
                                        <form action="{{ route('admin.destroy') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <button type="submit"><img src="{{ asset('medias/admin-trash.svg') }}"
                                                    alt="trash"></button>
                                        </form>
                                    </div>
                                </div>
                            @endif

                            @if ($user->role_id == 2)
                                <div class="user content">
                                    <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                                    <p>{{ $user->email }}</p>
                                    <div class="buttons"> <a href="{{ route('admin.edit', ['id' => $user->id]) }}"
                                            class="edit-btn"><img src="{{ asset('medias/admin-edit.svg') }}"
                                                alt="edit"></a>
                                        <form action="{{ route('admin.destroy') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <button type="submit"><img src="{{ asset('medias/admin-trash.svg') }}"
                                                    alt="trash"></button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>

                <section class="articles-admin articles">
                    <div class="top-bar">
                        <h2 id="articles">Articles</h2>
                        <a href="{{ route('article.create') }}">Add a new article</a>
                    </div>
                    <div class="content-container">
                        @foreach ($articles as $article)
                            <article class="article-admin content">
                                <p>{{ $article->title }}</p>
                                <p>{{ $article->description }}</p>
                                <p>{{ $article->date }}</p>
                                <div class="buttons"> <a href="{{ route('article.edit', ['id' => $article->id]) }}"
                                        class="edit-btn"><img src="{{ asset('medias/admin-edit.svg') }}"
                                            alt="edit"></a>
                                    <form action="{{ route('article.destroy') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $article->id }}">
                                        <button type="submit"><img src="{{ asset('medias/admin-trash.svg') }}"
                                                alt="trash"></button>
                                    </form>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>

                <section class="schedules-admin activities">
                    <div class="top-bar">
                        <h2 id="activities">Activities</h2>
                        <a href="{{ route('article.create') }}">Add a new activity</a>
                    </div>
                    <div class="content-container">
                        @foreach ($activities as $activity)
                            <div class="admin-activities content">
                                <p>{{ $activity->title }}</p>
                                <p>{{ $activity->artists }}</p>
                                <p>{{ date_format(date_create($activity->date), 'H:i:s') }}</p>
                                <p>{{ date_format(date_create($activity->Day[0]->date), 'Y-m-d') }}</p>
                                <div class="buttons">
                                    <a href="{{ route('activity.edit', ['id' => $activity->id]) }}"
                                        class="edit-btn"><img src="{{ asset('medias/admin-edit.svg') }}"
                                            alt="edit"></a>
                                    <form action="{{ route('activity.destroy') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $activity->id }}">
                                        <button type="submit"><img src="{{ asset('medias/admin-trash.svg') }}"
                                                alt="trash"></button>
                                    </form>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </section>
            </div>
        </div>
    </x-admin.layout>
</main>
