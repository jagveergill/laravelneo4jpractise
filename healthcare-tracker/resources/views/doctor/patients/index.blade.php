<h2>{{ __('All Registered Patients') }}</h2>
<ul>
    @foreach($patients as $patient)
        <li>{{ $patient->name }} ({{ $patient->email }})</li>
    @endforeach
</ul>
