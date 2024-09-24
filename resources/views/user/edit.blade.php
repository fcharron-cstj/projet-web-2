<x-layout>
    <header>
    </header>
    <main>
        <h2>Update your profile</h2>
        <div class="form">
            <form action="{{ route('user.update') }}" method="POST">
                @csrf

                <input type="hidden" name="id" value="{{ $user->id }}">

                <label for="first_name">First name</label>

                <input id="username" name="first_name" type="text" autocomplete="given-name"
                    value="{{ old('first_name') }}">

                <label for="last_name">Last name</label>

                <input id="last_name" name="last_name" type="text" autocomplete="family-name"
                    value="{{ old('last_name') }}">


                <button type="submit">Update</button>
            </form>
        </div>
    </main>
</x-layout>
