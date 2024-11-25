<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PerpustakaanResource\Pages;
use App\Models\Perpustakaan;
use Filament\Forms;
use Filament\Notifications\Collection;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class PerpustakaanResource extends Resource
{
    protected static ?string $model = Perpustakaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Perpustakaan';
    protected static ?string $pluralLabel = 'Buku';
    protected static ?string $singularLabel = 'Buku';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pengarang')
                    ->label('Pengarang')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('penerbit')
                    ->label('Penerbit')
                    ->required()
                    ->maxLength(255),
                SpatieMediaLibraryFileUpload::make(Perpustakaan::MEDIA_COLLECTION)
                    ->collection(Perpustakaan::MEDIA_COLLECTION)
                    ->downloadable()
                    ->columnSpanFull()
                    ->reorderable(),
                Forms\Components\TextInput::make('tahun_terbit')
                    ->label('Tahun Terbit')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')->label('Judul'),
                Tables\Columns\TextColumn::make('pengarang')->label('Pengarang'),
                Tables\Columns\TextColumn::make('penerbit')->label('Penerbit'),
                SpatieMediaLibraryImageColumn::make('gambar')
                    ->collection(Perpustakaan::MEDIA_COLLECTION)
                    ->label('Gambar'),
                Tables\Columns\TextColumn::make('tahun_terbit')->label('Tahun Terbit'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Ditambahkan'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPerpustakaans::route('/'),
            'create' => Pages\CreatePerpustakaan::route('/create'),
            'edit' => Pages\EditPerpustakaan::route('/{record}/edit'),
        ];
    }
}
