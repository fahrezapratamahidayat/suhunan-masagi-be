<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use Filament\Schemas\Schema;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;

class TeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->placeholder('Contoh: Pupi Indriati Zaelani, S.Sos., M.Si.')
                    ->required(),
                TextInput::make('position')
                    ->label('Jabatan')
                    ->placeholder('Contoh: Ketua Peneliti')
                    ->required(),
                FileUpload::make('image')
                    ->label('Foto')
                    ->image()
                    ->disk('public')
                    ->directory('team-members')
                    ->visibility('public')
                    ->avatar()
                    ->circleCropper()
                    ->downloadable()
                    ->openable()
                    ->previewable(true),
                TextInput::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
