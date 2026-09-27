<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EcommerceStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Produk', Product::count())
                ->description('Produk dalam katalog')
                ->descriptionIcon('heroicon-m-cube')
                ->color('primary'),

            Stat::make('Total Kategori', Category::count())
                ->description('Kategori tersedia')
                ->descriptionIcon('heroicon-m-tag')
                ->color('success'),

            Stat::make('Total Pengguna', User::count())
                ->description('Akun terdaftar')
                ->descriptionIcon('heroicon-m-users')
                ->color('warning'),

            Stat::make('Total Pesanan', Order::count())
                ->description('Pesanan tercatat')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('danger'),
        ];
    }
}