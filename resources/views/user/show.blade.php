<x-layout>
    <header>
    </header>
    <main class="dashboard">
        <div class="reservations-container">

            <h1>Account</h1>
            <p class="welcome">Welcome {{ $user->first_name }} {{ $user->last_name }}</p>

            <section class="reservations">
                <h2>Your reservations</h2>
                @if (count($reservations) == 0)
                    <p>You don't have any reservation yet.</p>
                @else
                    @foreach ($reservations as $reservation)
                        <div class="reservation">
                            <p>{{ $reservation->package->title }}</p>
                            <p>{{ $reservation->user->first_name . ' ' . $reservation->user->last_name }}</p>
                            <p>{{ 'from ' . date('d/m/Y', strtotime($reservation->arrival)) . ' to ' . date('d/m/Y', strtotime($reservation->departing)) }}
                            </p>
                            <form action="{{ route('reservation.destroy') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $reservation->id }}">
                                <button class="btn-cancel-user-rsv btn-pink-green">Cancel this ticket</button>
                            </form>
                        </div>
                    @endforeach
                @endif
            </section>
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
                    <input id="first_name" name="first_name" type="text" autocomplete="given-name" value="{{ $user->first_name }}">
            
                    <label for="last_name">Last name</label>
                    <x-forms.error champ="last_name" />
                    <input id="last_name" name="last_name" type="text" autocomplete="family-name" value="{{ $user->last_name }}">
            
                    <label for="email">Email</label>
                    <x-forms.error champ="email" />
                    <input id="email" name="email" type="email" value="{{ $user->email }}">
            
                    <label for="password">New Password</label>
                    <x-forms.error champ="password" />
                    <input id="password" name="password" type="password">
            
                    <label for="password_confirmation">Confirm New Password</label>
                    <x-forms.error champ="password_confirmation" />
                    <input id="password_confirmation" name="password_confirmation" type="password">
            
                    <button type="submit" class="btn-pink-green">Update</button>
                </form>
            </div>
            
        </div>
    </main>
    @vite('resources/js/alert_window.js')
</x-layout>
