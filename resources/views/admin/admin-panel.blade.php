<main>
    <x-admin.layout>
        <div class="admin-panel-container">
            <div class="admin-panel">
                <div class="title">
                    <h1>Welcome {{ auth()->user()->first_name }} !</h1> <a href="{{ route('home') }}">Go back to the site
                        →</a>
                </div>

                <div class="header">
                    <a href="#users">Users</a>
                    <a href="#articles">Articles</a>
                    <a href="#activities">Activities</a>
                    <a href="#reservations">Reservations</a>
                </div>

                <div class="options">
                    <input type="text" id="search" onkeyup="searchFilter()" placeholder="Search...">
                    <a href="" class="sort"><img src="{{ asset('medias/sort-icon.png') }}" alt="">
                    </a>
                    <a href="" class="order"><img src="{{ asset('medias/list-icon.png') }}" alt=""></a>
                </div>
                <div class="sort-popout">
                    <div class="close"> <img src="{{ asset('medias/x-close.svg') }}" alt=""></div>
                    <form class="sorting-options"></form>
                </div>

                <section class="users-admin users active">
                    <div class="top-bar">
                        <h2 id="users">Users</h2>
                        <a href="{{ route('admin.create') }}">Add a new user</a>
                    </div>
                    <div class="content-container">
                        @foreach ($users as $user)
                            @if ($user->role_id == 1)
                                <div class="admin content" data-id="{{ $user->id }}"
                                    data-name="{{ $user->first_name . ' ' . $user->last_name }}"
                                    data-email="{{ $user->email }}">
                                    <span class="id">{{ $user->id }}</span>
                                    <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                                    <p>{{ $user->email }}</p>
                                    <div class="buttons"> <a href="{{ route('admin.edit', ['id' => $user->id]) }}"
                                            class="edit-btn"><img src="{{ asset('medias/admin-edit.svg') }}"
                                                alt="edit"></a>
                                        <form action="{{ route('admin.destroy') }}" method="post" class="delete-btn">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            @if ($user->id != auth()->user()->id)
                                                <button type="submit"><img src="{{ asset('medias/admin-trash.svg') }}"
                                                        alt="trash"></button>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            @endif

                            @if ($user->role_id == 2)
                                <div class="user content" data-id="{{ $user->id }}"
                                    data-name="{{ $user->first_name . ' ' . $user->last_name }}"
                                    data-email="{{ $user->email }}">
                                    <span class="id">{{ $user->id }}</span>
                                    <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                                    <p>{{ $user->email }}</p>
                                    <div class="buttons"> <a href="{{ route('admin.edit', ['id' => $user->id]) }}"
                                            class="edit-btn"><img src="{{ asset('medias/admin-edit.svg') }}"
                                                alt="edit"></a>
                                        <form action="{{ route('admin.destroy') }}" method="post" class="delete-btn">
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
                            <div class="article-admin content" data-id="{{ $article->id }}"
                                data-title="{{ $article->title }}" data-description="{{ $article->description }}"
                                data-date="{{ $article->date }}">
                                <span class="id">{{ $article->id }}</span>
                                <p>{{ $article->title }}</p>
                                <p>{{ substr($article->description, 0, 90) }}
                                    @if (strlen($article->description) > 90)
                                        {{ '...' }}
                                    @endif
                                </p>
                                <p>{{ $article->date }}</p>
                                <div class="buttons"> <a href="{{ route('article.edit', ['id' => $article->id]) }}"
                                        class="edit-btn"><img src="{{ asset('medias/admin-edit.svg') }}"
                                            alt="edit"></a>
                                    <form action="{{ route('article.destroy') }}" method="post" class="delete-btn">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $article->id }}">
                                        <button type="submit"><img src="{{ asset('medias/admin-trash.svg') }}"
                                                alt="trash"></button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>

                <section class="schedules-admin activities">
                    <div class="top-bar">
                        <h2 id="activities">Activities</h2>
                        <a href="{{ route('activity.create') }}">Add a new activity</a>
                    </div>
                    <div class="content-container">
                        @foreach ($activities as $activity)
                            <div class="admin-activities content" data-id="{{ $activity->id }}"
                                data-title="{{ $activity->title }}" data-artists="{{ $activity->artists }}"
                                data-date="{{ $activity->date }}">
                                <span class="id">{{ $activity->id }}</span>
                                <p>{{ $activity->title }}</p>
                                <p>{{ $activity->artists }}</p>
                                <p>{{ date_format(date_create($activity->date), 'H:i:s') }}</p>
                                <p>{{ date_format(date_create($activity->Day[0]->date), 'Y-m-d') }}</p>
                                <div class="buttons">
                                    <a href="{{ route('activity.edit', ['id' => $activity->id]) }}"
                                        class="edit-btn"><img src="{{ asset('medias/admin-edit.svg') }}"
                                            alt="edit"></a>
                                    <form action="{{ route('activity.destroy') }}" method="post"
                                        class="delete-btn">
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

                <section class="reservations-admin reservations">
                    <div class="top-bar">
                        <h2 id="reservations">Reservations</h2>
                    </div>
                    <div class="content-container">
                        @foreach ($reservations as $reservation)
                            <div class="admin-activities content" data-id="{{ $reservation->id }}"
                                data-name="{{ $reservation->user->first_name . ' ' . $reservation->user->last_name }}"
                                data-arrival="{{ $reservation->arrival }}"
                                data-departing="{{ $reservation->departing }}"
                                data-package="{{$reservation->package->title }}"
                                data-price="{{$reservation->package->price}}">

                                <span class="id">{{ $reservation->id }}</span>
                                <p>{{$reservation->user->first_name}} {{$reservation->user->last_name}}</p>
                                <p>{{ $reservation->package->title }} {{ $reservation->package->price }}$</p>
                                <p><strong>Start:</strong> {{ $reservation->arrival }}</p>
                                <p><strong>End:</strong> {{ $reservation->departing }}</p>

                                <div class="buttons">
                                    <form action="{{ route('reservation.destroy') }}" method="post"
                                        class="delete-btn">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $reservation->id }}">
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
        @vite('resources/js/alert_window.js')

    </x-admin.layout>
</main>
