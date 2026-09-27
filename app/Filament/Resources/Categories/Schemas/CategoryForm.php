<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Kategori')
                    ->description('Kelola informasi kategori produk.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Kategori')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Elektronik'),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->placeholder('elektronik'),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(4)
                            ->placeholder('Deskripsi singkat tentang kategori...')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Status')
                    ->description('Atur apakah kategori tersedia untuk digunakan.')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Kategori Aktif')
                            ->default(true)
                            ->helperText('Kategori aktif dapat digunakan untuk produk.'),
                    ]),
            ]);
    }
}