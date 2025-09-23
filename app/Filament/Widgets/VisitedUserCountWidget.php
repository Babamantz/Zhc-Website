<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class VisitedUserCountWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            //
            //
            Stat::make('Users', User::count())
                ->description('Total registered users')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),
        ];
    }
}
