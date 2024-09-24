<x-layout>
    <div class="form">
        <form action="{{ route('admin.update') }}" method="POST">
            @csrf

            <input type="hidden" name="id" value="{{ $user->id }}">

            <label for="first_name">First name</label>

            <input id="username" name="first_name" type="text" autocomplete="given-name"
                value="{{ $user->first_name }}">

            <label for="last_name">Last name</label>

            <input id="last_name" name="last_name" type="text" autocomplete="family-name"
                value="{{ $user->last_name }}">

            <label for="email">Email</label>

            <input id="registeremail" name="email" type="email" autocomplete="email" value="{{ $user->email }}" />

            <button type="submit">Update the account</button>
        </form>
    </div>
</x-layout>
