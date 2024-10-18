<x-layout>
    <header>
    </header>
    <main class="dashboard">
        <div class="reservations-container">

            <h1>Account</h1>
            <p class="welcome">Welcome {{ $user->first_name }} {{ $user->last_name }}</p>
            <!-- Display of success messages -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="form">
                <form action="{{ route('user.update') }}" method="POST">
                    @csrf
                    <!-- Display of error messages -->
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <section class="reservations">
                        <h2>Your reservations</h2>
                        @foreach ($reservations as $reservation)
                            <div class="reservation">
                                <p>{{ $reservation->package->title }}</p>
                                <p>{{ $reservation->user->first_name . ' ' . $reservation->user->last_name }}</p>
                                <p>{{ 'from ' . date('d/m/Y', strtotime($reservation->arrival)) . ' to ' . date('d/m/Y', strtotime($reservation->departing)) }}
                                </p>
                                <form action="{{ route('reservation.destroy') }}" method="POST" class="delete-btn">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $reservation->id }}">
                                    <input class="btn-pink-green" type="submit" value="Cancel this ticket">
                                </form>
                            </div>
                        @endforeach
                    </section>
            </div>
        </div>
        <div class="form-container">
            <h2>Update your profile</h2>

            <div class="form">
                <form action="{{ route('user.update') }}" method="POST">
                    @csrf

                    <x-forms.error champ="id" />
                    <input type="hidden" name="id" value="{{ $user->id }}">

                    <label for="first_name">First name</label>

                    <x-forms.error champ="first_name" />
                    <input id="username" name="first_name" type="text" autocomplete="given-name"
                        value="{{ $user->first_name }}">

                    <label for="last_name">Last name</label>

                    <x-forms.error champ="last_name" />
                    <input id="last_name" name="last_name" type="text" autocomplete="family-name"
                        value="{{ $user->last_name }}">


                    <button type="submit" class="btn-pink-green">Update</button>
                </form>
            </div>
        </div>
    </main>
    @vite('resources/js/alert_window.js')
</x-layout>
