<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Produk')
                    ->description('Masukkan informasi utama produk.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Produk')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Laptop ASUS Vivobook'),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->placeholder('laptop-asus-vivobook'),

                        Select::make('category_id')
                            ->label('Kategori')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(5)
                            ->placeholder('Tuliskan deskripsi produk...')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Harga & Stok')
                    ->description('Atur harga dan jumlah stok produk.')
                    ->schema([
                        TextInput::make('price')
                            ->label('Harga')
                            ->required()
                            ->numeric()
                            ->prefix('Rp')
                            ->minValue(0)
                            ->placeholder('7500000'),

                        TextInput::make('stock')
                            ->label('Stok')
                            ->required()
                            ->numeric()
                            ->integer()
                            ->minValue(0)
                            ->default(0)
                            ->placeholder('10'),
                    ])
                    ->columns(2),

                Section::make('Gambar Produk')
                    ->description('Upload gambar utama produk.')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Gambar')
                            ->image()
                            ->imageEditor()
                            ->directory('products')
                            ->maxSize(2048)
                            ->helperText('Format JPG, JPEG, atau PNG. Maksimal 2 MB.')
                            ->columnSpanFull(),
                    ]),

                Section::make('Status Produk')
                    ->description('Atur status dan tampilan produk.')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Produk Aktif')
                            ->default(true)
                            ->helperText('Produk aktif dapat ditampilkan di katalog.'),

                        Toggle::make('is_featured')
                            ->label('Produk Unggulan')
                            ->default(false)
                            ->helperText('Tandai produk sebagai produk unggulan.'),
                    ])
                    ->columns(2),
            ]);
    }
}