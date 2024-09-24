<main>
    <x-layout>
        <section class="users">
            @foreach ($users as $user)
                @if ($user->role_id == 1)
                    <div class="admin">
                        <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                        <p>{{ $user->email }}</p>
                        {{-- <a href="{{ route('admin.edit', ['id' => $user->id]) }}">Edit</a>
                        <a href="{{ route('admin.destroy', ['id' => $user->id]) }}">Delete</a> --}}
                    </div>
                @endif

                @if ($user->role_id == 2)
                    <div class="user">
                        <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                        <p>{{ $user->email }}</p>
                        {{-- <a href="{{ route('admin.edit', ['id' => $user->id]) }}">Edit</a>
                    <a href="{{ route('admin.destroy', ['id' => $user->id]) }}">Delete</a> --}}
                    </div>
                @endif
            @endforeach
        </section>
    </x-layout>


</main>
