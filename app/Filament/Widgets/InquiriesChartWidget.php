<?php

namespace App\Filament\Widgets;

use App\Models\Inquiry;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class InquiriesChartWidget extends ChartWidget
{
    protected ?string $heading = 'Grafik Tren Pesan Masuk Klien';

    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $months = collect(range(5, 0))->map(function ($i) {
            $date = Carbon::now()->subMonths($i);
            $count = Inquiry::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();

            return [
                'label' => $date->format('M Y'),
                'count' => $count,
            ];
        });

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Inquiry Klien',
                    'data' => $months->pluck('count')->toArray(),
                    'fill' => 'start',
                    'borderColor' => '#00D1FF',
                    'backgroundColor' => 'rgba(0, 209, 255, 0.15)',
                ],
            ],
            'labels' => $months->pluck('label')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
