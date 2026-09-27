<?php

namespace App\Filament\Resources\Addresses\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AddressForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pelanggan')
                    ->description('Pilih pengguna yang memiliki alamat ini.')
                    ->schema([
                        Select::make('user_id')
                            ->label('Pelanggan')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        TextInput::make('label')
                            ->label('Label Alamat')
                            ->required()
                            ->default('Rumah')
                            ->placeholder('Rumah, Kantor, Kos'),
                    ])
                    ->columns(2),

                Section::make('Penerima')
                    ->description('Informasi penerima pesanan.')
                    ->schema([
                        TextInput::make('recipient_name')
                            ->label('Nama Penerima')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('phone')
                            ->label('Nomor Telepon')
                            ->tel()
                            ->required()
                            ->maxLength(20),
                    ])
                    ->columns(2),

                Section::make('Alamat Lengkap')
                    ->description('Masukkan detail lokasi pengiriman.')
                    ->schema([
                        Textarea::make('address')
                            ->label('Alamat')
                            ->required()
                            ->rows(4)
                            ->placeholder('Nama jalan, nomor rumah, RT/RW...')
                            ->columnSpanFull(),

                        TextInput::make('city')
                            ->label('Kota')
                            ->required(),

                        TextInput::make('province')
                            ->label('Provinsi')
                            ->required(),

                        TextInput::make('postal_code')
                            ->label('Kode Pos')
                            ->required()
                            ->maxLength(10),
                    ])
                    ->columns(2),

                Section::make('Pengaturan')
                    ->schema([
                        Toggle::make('is_default')
                            ->label('Jadikan Alamat Utama')
                            ->default(false)
                            ->helperText('Alamat utama dapat digunakan sebagai alamat default pelanggan.'),
                    ]),
            ]);
    }
}