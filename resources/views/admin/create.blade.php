<x-layout>
    <main id="user-admin-manage">
        <div class="user-admin-form-container">
            <h2>Create a new User</h2>
            <div class="form">
                <form action="{{ route('admin.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="first_name">First name</label>
                        <x-forms.error champ="first_name" />
                        <input id="first_name" name="first_name" type="text" autocomplete="given-name"
                            value="{{ old('first_name') }}" />
                    </div>

                    <div>
                        <label for="last_name">Last name</label>
                        <x-forms.error champ="last_name" />
                        <input id="last_name" name="last_name" type="text" autocomplete="family-name"
                            value="{{ old('last_name') }}">
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <x-forms.error champ="email" />
                        <input id="email" name="email" type="email" value="{{ old('email') }}">
                    </div>

                    <div>
                        <label for="password">Password</label>
                        <x-forms.error champ="password" />
                        <input  id="password" name="password" type="password" autocomplete="new-password">
                    </div>

                    <div>
                        <label for="password_confirmation">Confirm password</label>
                        <x-forms.error champ="password_confirmation" />
                        <input  id="password_confirmation" name="password_confirmation" type="password" autocomplete="current-password">
                    </div>

                    <div>
                        <label for="role_id">Role</label>
                        <x-forms.error champ="role_id" />
                        <select name="role_id" id="role_id">
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}" {{$role->id == 2 ? "selected" : ""}}>
                                    {{$role->title}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <button type="submit" class="btn-green-pink">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layout>
