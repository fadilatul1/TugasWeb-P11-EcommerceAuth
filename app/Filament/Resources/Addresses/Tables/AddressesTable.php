<?php

namespace App\Filament\Resources\Addresses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class AddressesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Pelanggan')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('label')
                    ->label('Label')
                    ->badge(),

                TextColumn::make('recipient_name')
                    ->label('Penerima')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('phone')
                    ->label('Telepon')
                    ->searchable(),

                TextColumn::make('city')
                    ->label('Kota')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('province')
                    ->label('Provinsi')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('postal_code')
                    ->label('Kode Pos')
                    ->searchable(),

                IconColumn::make('is_default')
                    ->label('Alamat Utama')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('is_default')
                    ->label('Alamat Utama'),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Edit'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}