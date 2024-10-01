<x-layout>
    <header>
    </header>
    <main>
        <h2>Log-in</h2>
        <!-- Displays success messages -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Displays error messages -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="form">
            <form action="{{ route('user.authenticate') }}" method="POST">
                @csrf
                <label for="email">Email</label>
    <main class="login-register">
        <div class="form-container login">
            <h2>Log-in</h2>
            <div class="form">
                <form action="{{ route('user.authenticate') }}" method="POST">
                    @csrf
                    <label for="email">Email</label>

                    <x-forms.error champ="email" />
                    <input id="loginemail" name="email" type="email" autocomplete="email"
                        value="{{ old('email') }}" />

                    <label for="password"> Password </label>

                    <x-forms.error champ="password" />
                    <input id="loginpassword" name="password" type="password" autocomplete="current-password" />

                    <button type="submit" class="btn-green-pink">Log-in</button>
                </form>
                <p>
                    <a href="#" id="no-account" class="form-link"> Don't have an account? </a>
                </p>
            </div>
        </div>
        <div class="form-container register">
            <h2>Register</h2>
            <div class="form">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf

                    <label for="first_name">First name</label>

                    <x-forms.error champ="first_name" />
                    <input id="username" name="first_name" type="text" autocomplete="given-name"
                        value="{{ old('first_name') }}">

                    <label for="last_name">Last name</label>

                    <x-forms.error champ="last_name" />
                    <input id="last_name" name="last_name" type="text" autocomplete="family-name"
                        value="{{ old('last_name') }}">

                    <label for="email">Email</label>

                    <x-forms.error champ="email" />
                    <input id="registeremail" name="email" type="email" autocomplete="email"
                        value="{{ old('email') }}" />

                    <label for="password"> Password </label>

                    <x-forms.error champ="password" />
                    <input id="registerpassword" name="password" type="password" autocomplete="current-password" />

                    <label for="confirm-password">Password confirmation</label>

                    <x-forms.error champ="password_confirmation" />
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        value="{{ old('password_confirmation') }}">

                    <button type="submit" class="btn-green-pink">Create account</button>
                </form>
                <p>
                    <a href="#" id="has-account" class="form-link"> Already have an account? </a>
                </p>
            </div>
        </div>
    </main>
    <script src="{{ asset('js/authform.js') }}"></script>
</x-layout>
