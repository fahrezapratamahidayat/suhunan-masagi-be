<?php

namespace App\Filament\Resources\Collections\Schemas;

use Filament\Schemas\Schema;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Set;
use Illuminate\Support\Str;

class CollectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Koleksi')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $state, $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                TextInput::make('type')
                    ->label('Kategori')
                    ->placeholder('Misal: Golok, Naskah, Alat Musik'),
                FileUpload::make('image')
                    ->label('Thumbnail Utama')
                    ->image()
                    ->directory('collections/thumbnails')
                    ->required(),
                FileUpload::make('gallery')
                    ->label('Galeri Foto Lainya')
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->directory('collections/gallery')
                    ->columnSpanFull(),
                RichEditor::make('description')
                    ->label('Deskripsi')
                    ->columnSpanFull(),
                Toggle::make('is_visible')
                    ->label('Tampilkan di Website')
                    ->default(true),
            ]);
    }
}
