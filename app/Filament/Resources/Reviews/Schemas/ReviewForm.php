<?php

namespace App\Filament\Resources\Reviews\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Review')
                    ->description('Kelola ulasan pelanggan terhadap produk.')
                    ->schema([
                        Select::make('user_id')
                            ->label('Pelanggan')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('product_id')
                            ->label('Produk')
                            ->relationship('product', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('rating')
                            ->label('Rating')
                            ->options([
                                1 => '⭐ 1',
                                2 => '⭐⭐ 2',
                                3 => '⭐⭐⭐ 3',
                                4 => '⭐⭐⭐⭐ 4',
                                5 => '⭐⭐⭐⭐⭐ 5',
                            ])
                            ->native(false)
                            ->required(),

                        Textarea::make('comment')
                            ->label('Komentar')
                            ->rows(5)
                            ->placeholder('Tulis ulasan pelanggan...')
                            ->required()
                            ->columnSpanFull(),

                        Toggle::make('approved')
                            ->label('Review Disetujui')
                            ->default(true)
                            ->helperText('Review yang disetujui dapat ditampilkan kepada pengguna.'),
                    ])
                    ->columns(2),
            ]);
    }
}