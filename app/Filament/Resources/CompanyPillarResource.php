<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyPillarResource\Pages;
use App\Models\CompanyPillar;
use BackedEnum;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use UnitEnum;

class CompanyPillarResource extends Resource
{
    protected static ?string $model = CompanyPillar::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-light-bulb';

    protected static string | UnitEnum | null $navigationGroup = 'Content Management';

    protected static ?string $navigationLabel = 'About Us Pillars';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Company Pillar Details')
                    ->schema([
                        Forms\Components\TextInput::make('title.id')
                            ->label('Judul Pilar (ID)')
                            ->required(),
                        Forms\Components\TextInput::make('title.en')
                            ->label('Pillar Title (EN)')
                            ->required(),

                        Forms\Components\Textarea::make('description.id')
                            ->label('Deskripsi (ID)')
                            ->rows(3)
                            ->required(),
                        Forms\Components\Textarea::make('description.en')
                            ->label('Description (EN)')
                            ->rows(3)
                            ->required(),

                        Forms\Components\TextInput::make('icon')
                            ->label('Icon Name')
                            ->default('lightbulb'),

                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('icon')
                    ->label('Icon'),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
            ])
            ->defaultSort('sort_order', 'asc')
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanyPillars::route('/'),
            'create' => Pages\CreateCompanyPillar::route('/create'),
            'edit' => Pages\EditCompanyPillar::route('/{record}/edit'),
        ];
    }
}
