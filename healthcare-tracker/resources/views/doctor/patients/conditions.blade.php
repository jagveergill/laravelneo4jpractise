<h2>{{ __('Assign Condition to Patient') }}</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('doctor.patients.storeCondition') }}">
    @csrf

    <label for="patient_id">{{ __('Select Patient') }}</label>
    <select name="patient_id" required>
        @foreach($patients as $patient)
            <option value="{{ $patient->id }}">{{ $patient->name }} ({{ $patient->email }})</option>
        @endforeach
    </select>

    <label for="condition">{{ __('Condition') }}</label>
    <input type="text" name="condition" required>

    <button type="submit">{{ __('Assign') }}</button>
</form>
