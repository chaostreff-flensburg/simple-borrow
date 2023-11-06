<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemResource\Pages;
use App\Models\Item;
use App\Models\StorageLocation;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
                Textarea::make('description'),
                Textarea::make('included'),
                TextInput::make('manual_link')
                    ->url()
                    ->suffixIcon('heroicon-m-globe-alt'),
                Toggle::make('require_training'),
                CheckboxList::make('tags')
                    ->columns(2)
                    ->gridDirection('row')
                    ->relationship('tags', titleAttribute: 'title'),
                Select::make('storage_location_id')
                    ->label('Storage Location')
                    ->options(StorageLocation::all()->pluck('name', 'id'))
                    ->searchable(['name', 'id']),
                FileUpload::make('image')
                    ->image()
                    ->maxFiles(1)
                    ->directory('images')
                    ->acceptedFileTypes(['image/*'])
                    ->imageResizeMode('cover')
                    ->imageResizeTargetWidth('820'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description')->limit(30),
                Tables\Columns\TextColumn::make('borrow_state'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }
}
