<h2>{{ __('Add Patient') }}</h2>

<form method="POST" action="{{ route('doctor.patients.store') }}">
    @csrf

    <label for="name">{{ __('Name') }}:</label>
    <input type="text" name="name" id="name" required><br>

    <label for="age">{{ __('Age') }}:</label>
    <input type="number" name="age" id="age"><br>

    <button type="submit">{{ __('Add Patient') }}</button>
</form>
