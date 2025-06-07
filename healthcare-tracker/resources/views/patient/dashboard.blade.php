<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Health Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <h3 class="text-lg font-bold mb-4">{{ __('My Conditions') }}</h3>

                @if (count($conditions))
                    <ul class="list-disc ml-6">
                        @foreach ($conditions as $condition)
                            <li>{{ $condition }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>{{ __('No conditions assigned yet.') }}</p>
                @endif
            </div>
        </div>

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <h3 class="text-lg font-bold mb-4">{{ __('Health Graph') }}</h3>
                <div class="mt-4">
                    <a href="{{ route('patient.graph') }}" class="text-blue-600 hover:underline">
                        {{ __('View Health Graph') }}
                    </a>
                </div>
            </div>
    </div>
</x-app-layout>
