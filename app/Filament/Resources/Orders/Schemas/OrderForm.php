<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pesanan')
                    ->description('Kelola informasi utama pesanan pelanggan.')
                    ->schema([
                        TextInput::make('order_number')
                            ->label('Nomor Pesanan')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->placeholder('ORD-2026-0001'),

                        Select::make('user_id')
                            ->label('Pelanggan')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('address_id')
                            ->label('Alamat Pengiriman')
                            ->relationship('address', 'recipient_name')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                    ])
                    ->columns(2),

                Section::make('Pembayaran')
                    ->description('Informasi total dan metode pembayaran.')
                    ->schema([
                        TextInput::make('total_amount')
                            ->label('Total Pesanan')
                            ->required()
                            ->numeric()
                            ->prefix('Rp')
                            ->minValue(0),

                        Select::make('payment_method')
                            ->label('Metode Pembayaran')
                            ->options([
                                'bank_transfer' => 'Transfer Bank',
                                'e_wallet' => 'E-Wallet',
                                'credit_card' => 'Kartu Kredit',
                                'cod' => 'Cash on Delivery',
                            ])
                            ->native(false)
                            ->required(),

                        Select::make('payment_status')
                            ->label('Status Pembayaran')
                            ->options([
                                'pending' => 'Pending',
                                'paid' => 'Paid',
                                'failed' => 'Failed',
                                'refunded' => 'Refunded',
                            ])
                            ->native(false)
                            ->required(),
                    ])
                    ->columns(2),

                Section::make('Status Pesanan')
                    ->description('Atur perkembangan pesanan pelanggan.')
                    ->schema([
                        Select::make('status')
                            ->label('Status Pesanan')
                            ->options([
                                'pending' => 'Pending',
                                'processing' => 'Processing',
                                'shipped' => 'Shipped',
                                'completed' => 'Completed',
                                'cancelled' => 'Cancelled',
                            ])
                            ->native(false)
                            ->required(),

                        Textarea::make('notes')
                            ->label('Catatan')
                            ->rows(4)
                            ->placeholder('Catatan tambahan untuk pesanan...')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}