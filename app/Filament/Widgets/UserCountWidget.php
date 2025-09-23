<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Visit;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserCountWidget extends StatsOverviewWidget
{
    // protected function getStats(): array
    // {

    //     $today = now()->toDateString();

    //     // total online visitors (last 5 minutes for example)
    //     $onlineVisitors = Visit::where('visited_at', '>=', now()->subMinutes(5))->distinct('ip_address')->count('ip_address');

    //     // unique visitors today
    //     $uniqueVisitorsToday = Visit::whereDate('visited_at', $today)->distinct('ip_address')->count('ip_address');

    //     // logged-in users today
    //     $uniqueUsersToday = Visit::whereDate('visited_at', $today)->whereNotNull('user_id')->distinct('user_id')->count('user_id');

    //     return [
    //         Stat::make('Online Visitors', $onlineVisitors)
    //             ->description('Active in last 5 min')
    //             ->descriptionIcon('heroicon-m-signal')
    //             ->color('primary'),

    //         Stat::make('Unique Visitors Today', $uniqueVisitorsToday)
    //             ->description('Distinct IPs today')
    //             ->descriptionIcon('heroicon-m-globe-alt')
    //             ->color('success'),

    //         Stat::make('Logged-in Users Today', $uniqueUsersToday)
    //             ->description('Authenticated users')
    //             ->descriptionIcon('heroicon-m-user-group')
    //             ->color('warning'),
    //     ];
    // }
    // protected function getStats(): array
    // {
    //     // Today
    //     $todayVisitors = Visit::whereDate('visited_at', now()->toDateString())
    //         ->distinct('ip_address')
    //         ->count('ip_address');

    //     // This week (from Monday to Sunday)
    //     $weekVisitors = Visit::whereBetween('visited_at', [
    //         now()->startOfWeek(),
    //         now()->endOfWeek(),
    //     ])
    //         ->distinct('ip_address')
    //         ->count('ip_address');

    //     // This month
    //     $monthVisitors = Visit::whereBetween('visited_at', [
    //         now()->startOfMonth(),
    //         now()->endOfMonth(),
    //     ])
    //         ->distinct('ip_address')
    //         ->count('ip_address');

    //     return [
    //         Stat::make('Visitors Today', $todayVisitors)
    //             ->description('Unique visitors for ' . now()->format('M d'))
    //             ->descriptionIcon('heroicon-m-calendar')
    //             ->color('success'),

    //         Stat::make('Visitors This Week', $weekVisitors)
    //             ->description('Unique visitors from Mon–Sun')
    //             ->descriptionIcon('heroicon-m-calendar-days')
    //             ->color('primary'),

    //         Stat::make('Visitors This Month', $monthVisitors)
    //             ->description('Unique visitors in ' . now()->format('F'))
    //             ->descriptionIcon('heroicon-m-chart-bar')
    //             ->color('warning'),
    //     ];
    // }

    protected function getStats(): array
    {
        // Today (all visits, not unique IPs)
        $todayVisits = Visit::whereDate('visited_at', now()->toDateString())
            ->count();

        // This week (all visits)
        $weekVisits = Visit::whereBetween('visited_at', [
            now()->startOfWeek(),
            now()->endOfWeek(),
        ])->count();

        // This month (all visits)
        $monthVisits = Visit::whereBetween('visited_at', [
            now()->startOfMonth(),
            now()->endOfMonth(),
        ])->count();

        return [
            Stat::make('Visits Today', $todayVisits)
                ->description('Total page visits on ' . now()->format('M d'))
                ->descriptionIcon('heroicon-m-calendar')
                ->color('success'),

            Stat::make('Visits This Week', $weekVisits)
                ->description('Total visits from Mon–Sun')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('primary'),

            Stat::make('Visits This Month', $monthVisits)
                ->description('Total visits in ' . now()->format('F'))
                ->descriptionIcon('heroicon-m-chart-bar')
                ->color('warning'),
        ];
    }
}
