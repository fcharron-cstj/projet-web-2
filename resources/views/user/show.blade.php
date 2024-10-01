<x-layout>
    <header>
    </header>
    <main>
        <h2>Update your profile</h2>
        <!-- Display of success messages -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display of error messages -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
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


                <button type="submit">Update</button>
            </form>
        </div>
        <section class="reservations">
            <h2>Reservations</h2>
            @foreach ($reservations as $reservation)
                <div class="reservation">
                    <p>{{ $reservation->package->title }}</p>
                    <p>{{ $reservation->user->first_name . ' ' . $reservation->user->last_name }}</p>
                    <p>{{ 'from ' . date('d/m/Y', strtotime($reservation->arrival)) . ' to ' . date('d/m/Y', strtotime($reservation->departing)) }}
                    </p>
                    <form action="{{ route('reservation.destroy') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $reservation->id }}">
                        <input type="submit" value="Delete">
                    </form>
                </div>
            @endforeach
        </section>
    </main>
</x-layout>
