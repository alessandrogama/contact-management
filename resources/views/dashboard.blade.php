<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Seja bem-vindo ao Painel Administrativo") }}
                </div>
            </div>

            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white dark:bg-gray-700 text-gray-900 dark:text-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Total de Contatos</h3>
                    <p class="text-3xl">{{ $totalContacts }}</p>
                </div>

                <div class="bg-white dark:bg-gray-700 text-gray-900 dark:text-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Último Contato Cadastrado</h3>
                    @if($lastContact)
                        <ul class="mt-2 space-y-1">
                            <li><strong>Nome:</strong> {{ $lastContact->name }}</li>
                            <li><strong>Contato:</strong> {{ $lastContact->contact }}</li>
                            <li><strong>Email:</strong> {{ $lastContact->email }}</li>
                            <li><strong>Data:</strong> {{ $lastContact->created_at->format('d/m/Y H:i') }}</li>
                        </ul>
                    @else
                        <p class="mt-2">Nenhum contato ainda.</p>
                    @endif
                </div>
            </div>

            {{-- Gráficos --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Contatos por Mês</h3>
                    <canvas id="barChart" height="100"></canvas>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Domínios de E-mail</h3>
                    <canvas id="pieChart" height="100"></canvas>
                </div>
            </div>

        </div>
    </div>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Contatos',
                    data: {!! json_encode($values) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1 }
                    }
                }
            }
        });

        new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: {
                labels: {!! json_encode($emailDomains->keys()) !!},
                datasets: [{
                    data: {!! json_encode($emailDomains->values()) !!},
                    backgroundColor: [
                        '#4e73df', '#1cc88a', '#36b9cc',
                        '#f6c23e', '#e74a3b', '#858796'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });
    </script>
</x-app-layout>
