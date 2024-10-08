@props(['champ'])

@error($champ)
    <span class="error">
        <img src="/medias/error.png" alt="Error">
        {{ $message }}
    </span>
@enderror
