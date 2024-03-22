<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemResource\Pages;
use App\Models\Item;
use App\Models\StorageLocation;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder;

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
                Checkbox::make('approved')->name('Approved')->default(true),
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
                Tables\Columns\TextColumn::make('approved'),
            ])
            ->filters([
                Filter::make('approved')->toggle()
                    ->label('Not approved')
                    ->query(fn (Builder $query): Builder => $query->where('approved', false)),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('approve')
                    ->label('Approve')
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->action(fn (Item $item) => $item->update(['approved' => true])),
                Action::make('disapprove')
                    ->label('Disapprove')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->action(fn (Item $item) => $item->delete()),
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
