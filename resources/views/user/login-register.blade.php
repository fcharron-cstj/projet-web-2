<x-layout>
    <header>
    </header>
    <main>
        <h2>Log-in</h2>
        <div class="form">
            <form action="{{ route('user.authenticate') }}" method="POST">
                @csrf
                <label for="email">Email</label>

                <input id="email" name="email" type="email" autocomplete="email" value="{{ old('email') }}" />

                <label for="password"> Password </label>

                <input id="password" name="password" type="password" autocomplete="current-password" />
                <button type="submit">Login in</button>
            </form>
            <p>
                <a href=""> Don't have an account? </a>
            </p>
        </div>
        <h2>Register</h2>
        <div class="form">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf


                <label for="first_name">First name</label>

                <input id="username" name="first_name" type="text" autocomplete="given-name"
                    value="{{ old('first_name') }}">

                <label for="last_name">Last name</label>

                <input id="last_name" name="last_name" type="text" autocomplete="family-name"
                    value="{{ old('last_name') }}">

                <label for="email">Email</label>

                <input id="email" name="email" type="email" autocomplete="email" value="{{ old('email') }}" />

                <label for="password"> Password </label>

                <input id="password" name="password" type="password" autocomplete="current-password" />

                <label for="confirm-password">Password confirmation</label>

                <input id="password_confirmation" name="password_confirmation" type="password"
                    value="{{ old('password_confirmation') }}">

                <button type="submit">Create your account</button>
            </form>
            <p>
                <a href=""> Already have an account? </a>
            </p>
        </div>
    </main>
</x-layout>
