<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pengguna')
                    ->description('Kelola data akun pengguna.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Nama lengkap'),

                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        Select::make('role')
                            ->label('Role')
                            ->options([
                                'admin' => 'Admin',
                                'editor' => 'Editor',
                                'user' => 'User',
                            ])
                            ->default('user')
                            ->required()
                            ->native(false),

                        DateTimePicker::make('email_verified_at')
                            ->label('Email Terverifikasi'),
                    ])
                    ->columns(2),

                Section::make('Keamanan Akun')
                    ->description('Password digunakan untuk login ke aplikasi.')
                    ->schema([
                        TextInput::make('password')
                            ->label('Password')
                            ->password()
                            ->revealable()
                            ->dehydrateStateUsing(
                                fn ($state) => filled($state) ? Hash::make($state) : null
                            )
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->minLength(8)
                            ->maxLength(255)
                            ->placeholder('Minimal 8 karakter'),
                    ]),
            ]);
    }
}