<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CapabilityResource\Pages;
use App\Models\Capability;
use BackedEnum;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use UnitEnum;

class CapabilityResource extends Resource
{
    protected static ?string $model = Capability::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-cpu-chip';

    protected static string | UnitEnum | null $navigationGroup = 'Content Management';

    protected static ?string $navigationLabel = 'AI Engine Capabilities';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('AI Engine Solution Information')
                    ->schema([
                        Forms\Components\TextInput::make('badge.id')
                            ->label('Badge (ID)')
                            ->default('AI Engine')
                            ->required(),
                        Forms\Components\TextInput::make('badge.en')
                            ->label('Badge (EN)')
                            ->default('AI Engine')
                            ->required(),

                        Forms\Components\TextInput::make('title.id')
                            ->label('Judul (ID)')
                            ->required(),
                        Forms\Components\TextInput::make('title.en')
                            ->label('Title (EN)')
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
                            ->label('Icon Identifier')
                            ->default('sparkles'),

                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Active on Website')
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
            'index' => Pages\ListCapabilities::route('/'),
            'create' => Pages\CreateCapability::route('/create'),
            'edit' => Pages\EditCapability::route('/{record}/edit'),
        ];
    }
}
