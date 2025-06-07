<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Health Graph') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <div id="health-graph" style="height: 500px;"></div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/vis-network@9.1.2/dist/vis-network.min.js"></script>
    <link href="https://unpkg.com/vis-network@9.1.2/dist/vis-network.min.css" rel="stylesheet">

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const data = {!! $graphData !!};

            const container = document.getElementById('health-graph');
            const options = {
                nodes: {
                    shape: 'dot',
                    size: 20,
                    font: { size: 16 }
                },
                edges: {
                    arrows: 'to'
                },
                layout: {
                    improvedLayout: true
                },
                physics: {
                    enabled: true
                }
            };

            const network = new vis.Network(container, data, options);
        });
    </script>
</x-app-layout>
