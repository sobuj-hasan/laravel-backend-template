@extends('backend.layouts.app')

@section('title') Visitor Analytics @endsection

@section('content')
    <div class="flex-1 flex flex-col pt-4 lg:pt-8">
        <main id="main-content" class="flex-1 p-3 sm:p-4 lg:p-6 xl:p-8 bg-gray-50 dark:bg-gray-900 overflow-y-auto">
            <div class="mb-4 sm:mb-6 lg:mb-8">
                <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">Visitor Analytics</h1>
            </div>

            <!-- KPI Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6 mb-4 sm:mb-6 lg:mb-8">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4">
                    <p class="text-xs font-medium text-gray-600 dark:text-gray-400">Total Visits</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $total_visitors }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4">
                    <p class="text-xs font-medium text-gray-600 dark:text-gray-400">Unique Visitors (IP)</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $total_unique_visitors }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4">
                    <p class="text-xs font-medium text-gray-600 dark:text-gray-400">Unique Sessions</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $total_unique_sessions }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4">
                    <p class="text-xs font-medium text-gray-600 dark:text-gray-400">Last Visitor</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ optional($visitorLogs->first())->created_at?->diffForHumans() ?? '—' }}</p>
                </div>
            </div>

            <!-- Service Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6 mb-4 sm:mb-6 lg:mb-8">
                @php
                    $labels = [
                        'bedroom-service' => 'Bedroom',
                        'living-room-service' => 'Living Room',
                        'dining-room-service' => 'Dining Room',
                        'kitchen-service' => 'Kitchen',
                        'bathroom-service' => 'Bathroom',
                        'exterior-service' => 'Exterior',
                        'office-service' => 'Office',
                    ];
                @endphp
                @foreach($serviceCounts as $route => $count)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4">
                    <div class="flex items-center justify-between">
                        <p class="text-xs font-medium text-gray-600 dark:text-gray-400">{{ $labels[$route] ?? $route }}</p>
                        <span class="inline-flex px-2 py-0.5 text-xs rounded-full bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-300">Route</span>
                    </div>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">{{ $count }}</p>
                </div>
                @endforeach
            </div>

            <!-- Chart Section -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-4 sm:p-5 lg:p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 sm:gap-0">
                        <h2 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white">Visitors Over Time</h2>
                        <div class="flex items-center space-x-2">
                            <button data-range="daily" class="range-btn px-2 py-1 text-xs font-medium bg-indigo-100 dark:bg-indigo-900 text-indigo-700 dark:text-indigo-300 rounded-lg">Daily</button>
                            <button data-range="weekly" class="range-btn px-2 py-1 text-xs font-medium text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">Weekly</button>
                            <button data-range="monthly" class="range-btn px-2 py-1 text-xs font-medium text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">Monthly</button>
                            <button data-range="yearly" class="range-btn px-2 py-1 text-xs font-medium text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">Yearly</button>
                        </div>
                    </div>
                </div>
                <div class="p-4 sm:p-5 lg:p-6">
                    <div class="relative w-full overflow-x-auto">
                        <div class="min-w-[320px]">
                            <canvas id="visitorsChart" class="w-full h-48 sm:h-56 lg:h-64"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent logs table (simple) -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 mt-4">
                <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Recent Visits</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[720px] divide-y divide-gray-200 dark:divide-gray-700 text-xs">
                        <thead class="bg-gray-50 dark:bg-gray-900">
                            <tr>
                                <th class="px-3 py-2 text-left text-gray-500 dark:text-gray-400">Time</th>
                                <th class="px-3 py-2 text-left text-gray-500 dark:text-gray-400">IP</th>
                                <th class="px-3 py-2 text-left text-gray-500 dark:text-gray-400 hidden md:table-cell">URL</th>
                                <th class="px-3 py-2 text-left text-gray-500 dark:text-gray-400 hidden lg:table-cell">UA</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($visitorLogs as $log)
                            <tr>
                                <td class="px-3 py-2 text-gray-900 dark:text-white">{{ $log->created_at->format('Y-m-d H:i') }}</td>
                                <td class="px-3 py-2 text-gray-900 dark:text-white">{{ $log->ip_address }}</td>
                                <td class="px-3 py-2 text-gray-500 dark:text-gray-400 truncate max-w-[240px] hidden md:table-cell">{{ $log->referer }}</td>
                                <td class="px-3 py-2 text-gray-500 dark:text-gray-400 truncate max-w-[320px] hidden lg:table-cell">{{ $log->user_agent }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-3 py-3 border-t border-gray-200 dark:border-gray-700"></div>
            </div>
        </main>
    </div>

    @push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const ctx = document.getElementById('visitorsChart');
            const datasets = {
                daily: { labels: @json($daily_labels), data: @json($daily_values) },
                weekly: { labels: @json($weekly_labels), data: @json($weekly_values) },
                monthly: { labels: @json($monthly_labels), data: @json($monthly_values) },
                yearly: { labels: @json($yearly_labels), data: @json($yearly_values) },
            };
            const makeConfig = (labels, data) => ({
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Visitors',
                        data: data,
                        borderColor: 'rgb(99, 102, 241)', // indigo-500
                        borderWidth: 3,
                        backgroundColor: (ctx) => {
                            const { chart } = ctx;
                            const { ctx: c, chartArea } = chart;
                            if (!chartArea) return 'rgba(99, 102, 241, 0.35)';
                            const gradient = c.createLinearGradient(0, chartArea.top, 0, chartArea.bottom);
                            gradient.addColorStop(0, 'rgba(99, 102, 241, 0.40)');
                            gradient.addColorStop(1, 'rgba(99, 102, 241, 0.00)');
                            return gradient;
                        },
                        tension: 0.35,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        pointBackgroundColor: '#F59E0B', // amber-500 highlights points
                        pointBorderColor: '#1F2937', // gray-800 for contrast on dark bg
                        pointBorderWidth: 2,
                        fill: true,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        tooltip: { mode: 'index', intersect: false, backgroundColor: 'rgba(17, 24, 39, 0.9)', titleColor: '#E5E7EB', bodyColor: '#E5E7EB', borderColor: '#4B5563', borderWidth: 1 }
                    },
                    scales: {
                        x: { grid: { color: 'rgba(156, 163, 175, 0.15)' }, ticks: { color: '#9CA3AF' } },
                        y: { beginAtZero: true, grid: { color: 'rgba(156, 163, 175, 0.15)' }, ticks: { color: '#9CA3AF' } }
                    }
                }
            });
            let current = 'daily';
            let chart = new Chart(ctx, makeConfig(datasets[current].labels, datasets[current].data));
            document.querySelectorAll('.range-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelectorAll('.range-btn').forEach(b => b.classList.remove('bg-indigo-100', 'dark:bg-indigo-900', 'text-indigo-700', 'dark:text-indigo-300'));
                    btn.classList.add('bg-indigo-100', 'dark:bg-indigo-900', 'text-indigo-700', 'dark:text-indigo-300');
                    current = btn.dataset.range;
                    chart.destroy();
                    chart = new Chart(ctx, makeConfig(datasets[current].labels, datasets[current].data));
                })
            });
        });
    </script>
    @endpush
@endsection


