<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Schemas\Schema;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;
use Illuminate\Support\Str;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Artikel')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $state, $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                Select::make('type')
                    ->label('Tipe')
                    ->options([
                        'news' => 'Berita',
                        'blog' => 'Blog',
                        'announcement' => 'Pengumuman',
                    ])
                    ->required()
                    ->default('news'),
                FileUpload::make('image')
                    ->label('Gambar Utama')
                    ->image()
                    ->disk('public')
                    ->directory('articles'),
                RichEditor::make('content')
                    ->label('Konten')
                    ->columnSpanFull(),
                Textarea::make('excerpt')
                    ->label('Ringkasan')
                    ->columnSpanFull(),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Dipublikasikan',
                        'archived' => 'Diarsipkan',
                    ])
                    ->default('draft')
                    ->required(),
                DatePicker::make('published_at')
                    ->label('Tanggal Publikasi'),
            ]);
    }
}
