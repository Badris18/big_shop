<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubCategoryResource\Pages;
use App\Filament\Resources\SubCategoryResource\RelationManagers;
use App\Models\SubCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Enums\SubCategoryStatus;

class SubCategoryResource extends Resource
{
    protected static ?string $model = SubCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Select::make('status')
                    ->options(SubCategoryStatus::class)
                    ->default(null),
                Forms\Components\FileUpload::make('image_path')
                    ->image()
                    ->directory('Sub Category'),
                Forms\Components\TextInput::make('buying_price')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('selling_price')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('earned_profit')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('measurement_unit')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('current_qty')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('reorder_level')
                    ->numeric()
                    ->default(null),
                Forms\Components\Select::make('company_id')
                    ->relationship('company','name')
                    ->default(null),
                Forms\Components\Select::make('category_id')
                    ->relationship('category','name')
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->required(),
                    ])
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state):string =>match($state){
                        SubCategoryStatus::PUBLISHED->value=>'success',
                        SubCategoryStatus::DRAFT->value=>'danger',
                        SubCategoryStatus::PENDING->value=>'warning',
                    })
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image_path')
                    ->getStateUsing(fn (SubCategory $record): string=> $record->getImagePath()),
                Tables\Columns\TextColumn::make('buying_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('selling_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('earned_profit')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('measurement_unit')
                    ->searchable(),
                Tables\Columns\TextColumn::make('current_qty')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('reorder_level')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('company.name')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListSubCategories::route('/'),
            'create' => Pages\CreateSubCategory::route('/create'),
            'edit' => Pages\EditSubCategory::route('/{record}/edit'),
        ];
    }
}
