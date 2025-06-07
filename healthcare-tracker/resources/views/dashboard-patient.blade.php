<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patient Dashboard') }}
            <p>{{ __('Welcome, :name', ['name' => auth()->user()->getAuthIdentifierName()]) }}</p>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                {{ __("You're logged in!") }}
                <div class="mt-4">
                    <a href="{{ route('patient.dashboard') }}" class="text-blue-600 hover:underline">
                        {{ __('View Health Dashboard') }}
                    </a>
                </div>

                <div class="mt-4">
                    <a href="{{ route('patient.graph') }}" class="text-blue-600 hover:underline">
                        {{ __('View Health Graph') }}
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
