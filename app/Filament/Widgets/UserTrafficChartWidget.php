<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Visit;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class UserTrafficChartWidget extends ChartWidget
{
    protected ?string $heading = 'User Traffic (This Week)';

    protected function getData(): array
    {
        // last 7 days from oldest to today
        $dates = collect(range(6, 0))->map(fn($daysAgo) => now()->subDays($daysAgo));

        $uniqueVisitors = $dates->map(function ($date) {
            return Visit::whereDate('visited_at', $date->toDateString())
                ->distinct('ip_address')
                ->count('ip_address');
        });

        $totalVisits = $dates->map(function ($date) {
            return Visit::whereDate('visited_at', $date->toDateString())->count();
        });

        $uniqueUsers = $dates->map(function ($date) {
            return Visit::whereDate('visited_at', $date->toDateString())
                ->whereNotNull('user_id')
                ->distinct('user_id')
                ->count('user_id');
        });

        return [
            'datasets' => [
                [
                    'label' => 'Unique Visitors',
                    'data' => $uniqueVisitors,
                    'borderColor' => '#10b981', // green
                    'backgroundColor' => 'rgba(16,185,129,0.2)',
                ],
                [
                    'label' => 'Total Visits',
                    'data' => $totalVisits,
                    'borderColor' => '#3b82f6', // blue
                    'backgroundColor' => 'rgba(59,130,246,0.2)',
                ],
                [
                    'label' => 'Logged-in Users',
                    'data' => $uniqueUsers,
                    'borderColor' => '#f59e0b', // amber
                    'backgroundColor' => 'rgba(245,158,11,0.2)',
                ],
            ],
            'labels' => $dates->map(fn($date) => $date->format('D')),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
