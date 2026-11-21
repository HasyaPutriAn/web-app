<label for="id_admin">ID Admin</label>
<input
    id="id_admin"
    name="id_admin"
    type="number"
    min="1"
    value="{{ old('id_admin', isset($admin) ? $admin->id_admin : '') }}"
    @if (isset($admin)) readonly @else required @endif
>
@error('id_admin')
    <p class="field-error">{{ $message }}</p>
@enderror

<label for="username">Username</label>
<input
    id="username"
    name="username"
    type="text"
    maxlength="100"
    value="{{ old('username', isset($admin) ? $admin->username : '') }}"
    required
>
@error('username')
    <p class="field-error">{{ $message }}</p>
@enderror

<label for="password">Password @isset($admin)<span>(kosongkan jika tidak ingin mengganti)</span>@endisset</label>
<input
    id="password"
    name="password"
    type="password"
    minlength="8"
    maxlength="100"
    @empty($admin) required @endempty
    autocomplete="new-password"
>
@error('password')
    <p class="field-error">{{ $message }}</p>
@enderror
