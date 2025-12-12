<?php

namespace App\Filament\Resources\Heroes\Schemas;

use Filament\Schemas\Schema;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class HeroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Hero')
                    ->placeholder('Contoh: Selamat Datang di Museum')
                    ->nullable(),
                Textarea::make('subtitle')
                    ->label('Sub Judul')
                    ->rows(3)
                    ->nullable(),
                FileUpload::make('image')
                    ->label('Gambar Slider')
                    ->image()
                    ->directory('hero-slides')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('cta_text')
                    ->label('Teks Tombol')
                    ->placeholder('Contoh: Lihat Koleksi'),
                TextInput::make('cta_link')
                    ->label('Link Tombol')
                    ->url()
                    ->placeholder('https://...'),
                TextInput::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }
}
