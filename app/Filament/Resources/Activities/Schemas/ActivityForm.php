<?php

namespace App\Filament\Resources\Activities\Schemas;

use Filament\Schemas\Schema;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Set;
use Illuminate\Support\Str;

class ActivityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Kegiatan')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $state, $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                FileUpload::make('image')
                    ->label('Gambar')
                    ->image()
                    ->directory('activities'),
                DatePicker::make('date')
                    ->label('Tanggal Kegiatan')
                    ->required(),
                TimePicker::make('start_time')
                    ->label('Waktu Mulai')
                    ->required(),
                TimePicker::make('end_time')
                    ->label('Waktu Selesai')
                    ->required(),
                TextInput::make('location')
                    ->label('Lokasi')
                    ->required(),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'upcoming' => 'Akan Datang',
                        'ongoing' => 'Sedang Berlangsung',
                        'completed' => 'Selesai',
                        'cancelled' => 'Dibatalkan',
                    ])
                    ->default('upcoming')
                    ->required(),
                RichEditor::make('content')
                    ->label('Konten')
                    ->columnSpanFull(),
                Textarea::make('excerpt')
                    ->label('Ringkasan')
                    ->columnSpanFull(),
            ]);
    }
}
