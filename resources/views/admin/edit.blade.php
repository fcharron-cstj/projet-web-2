<x-layout title="Edit admin account">
    <main id="user-admin-manage">
        <div class="user-admin-form-container">
            <h2>Update user {{ $user->first_name }}</h2>
            <div class="form">
                <form action="{{ route('admin.update') }}" method="POST">
                    @csrf

                    <x-forms.error champ="id" />
                    <input type="hidden" name="id" value="{{$user->id}}">

                    <div>
                        <label for="first_name">First name</label>
                        <x-forms.error champ="first_name" />
                        <input id="first_name" name="first_name" type="text" autocomplete="given-name"
                            value="{{ old('first_name', $user->first_name) }}" />
                    </div>

                    <div>
                        <label for="last_name">Last name</label>
                        <x-forms.error champ="last_name" />
                        <input id="last_name" name="last_name" type="text" autocomplete="family-name"
                            value="{{ old('last_name', $user->last_name) }}">
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <x-forms.error champ="email" />
                        <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}">
                    </div>

                    <div>
                        <button type="submit" class="btn-blue-pink">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layout>
