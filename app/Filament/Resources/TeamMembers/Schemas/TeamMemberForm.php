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
                    ->directory('team-members')
                    ->avatar()
                    ->circleCropper(),
                TextInput::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
