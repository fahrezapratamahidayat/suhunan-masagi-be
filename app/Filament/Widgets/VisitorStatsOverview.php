<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use App\Models\Visitor;

class VisitorStatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1; // Show first

    protected function getStats(): array
    {
        return [
            Stat::make('Kunjungan Hari Ini', Visitor::whereDate('created_at', today())->count())
                ->description('Total pengunjung hari ini')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),
            Stat::make('Kunjungan Minggu Ini', Visitor::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count())
                ->description('Total minggu ini')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('primary'),
            Stat::make('Kunjungan Bulan Ini', Visitor::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count())
                ->description('Total bulan ini')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('warning'),
            Stat::make('Total Kunjungan', Visitor::count())
                ->description('Total keseluruhan')
                ->descriptionIcon('heroicon-m-globe-alt')
                ->color('info'),
        ];
    }
}
