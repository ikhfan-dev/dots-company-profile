<?php

namespace App\Filament\Widgets;

use App\Models\Capability;
use App\Models\Inquiry;
use App\Models\Partner;
use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CmsOverviewStatsWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalInquiries = Inquiry::count();
        $unreadInquiries = Inquiry::where('is_read', false)->count();

        $activePartners = Partner::where('is_active', true)->count();
        $totalProjects = Project::where('is_active', true)->count();
        $totalCapabilities = Capability::where('is_active', true)->count();

        return [
            Stat::make('Inbox Pesan Klien', $totalInquiries)
                ->description($unreadInquiries > 0 ? "{$unreadInquiries} pesan baru belum dibaca" : 'Semua pesan telah dibaca')
                ->descriptionIcon($unreadInquiries > 0 ? 'heroicon-m-envelope-open' : 'heroicon-m-check-badge')
                ->color($unreadInquiries > 0 ? 'warning' : 'success')
                ->chart([3, 5, 7, 10, 12, 15, $totalInquiries]),

            Stat::make('Mitra Strategis Aktif', $activePartners)
                ->description('Mitra terhubung di ekosistem')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('info')
                ->chart([2, 3, 4, 5, 5, 6, $activePartners]),

            Stat::make('Portofolio Proyek', $totalProjects)
                ->description('Proyek korporat dipublikasi')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('primary')
                ->chart([1, 2, 3, 4, 4, 5, $totalProjects]),

            Stat::make('Kapabilitas AI Engine', $totalCapabilities)
                ->description('Modul AI & IoT aktif')
                ->descriptionIcon('heroicon-m-sparkles')
                ->color('success')
                ->chart([2, 4, 5, 6, 6, 6, $totalCapabilities]),
        ];
    }
}
