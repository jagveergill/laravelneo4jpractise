<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctor Dashboard') }}
            <p>{{ __('Welcome, :name', ['name' => auth()->user()->getAuthIdentifierName()]) }}</p>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                {{ __("You're logged in!") }}
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <h3 class="text-lg font-bold mb-2">{{ __('Patient Management') }}</h3>
                <ul class="list-disc ml-6 space-y-1">
                    <li>
                        <a href="{{ route('doctor.patients.index') }}" class="text-blue-600 hover:underline">
                            {{ __('View Registered Patients') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('doctor.patients.conditions') }}" class="text-blue-600 hover:underline">
                            {{ __('Assign Condition to Patient') }}
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>
