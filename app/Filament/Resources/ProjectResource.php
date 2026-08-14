<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use BackedEnum;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use UnitEnum;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-briefcase';

    protected static string | UnitEnum | null $navigationGroup = 'Content Management';

    protected static ?string $navigationLabel = 'Projects & Track Record';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Project Overview')
                    ->schema([
                        Forms\Components\TextInput::make('client_name')
                            ->label('Client Name (e.g. Menara Bank Danamon)')
                            ->required(),

                        Forms\Components\TextInput::make('category.id')
                            ->label('Kategori (ID)')
                            ->required(),
                        Forms\Components\TextInput::make('category.en')
                            ->label('Category (EN)')
                            ->required(),

                        Forms\Components\TextInput::make('title.id')
                            ->label('Judul Proyek (ID)')
                            ->required(),
                        Forms\Components\TextInput::make('title.en')
                            ->label('Project Title (EN)')
                            ->required(),

                        Forms\Components\Textarea::make('description.id')
                            ->label('Deskripsi (ID)')
                            ->rows(3)
                            ->required(),
                        Forms\Components\Textarea::make('description.en')
                            ->label('Description (EN)')
                            ->rows(3)
                            ->required(),

                        Forms\Components\TagsInput::make('tags')
                            ->label('Tags (e.g. Hikvision Integrated, Cloud Sync)'),

                        Forms\Components\TextInput::make('icon')
                            ->label('Icon Name')
                            ->default('car-front'),

                        Forms\Components\Toggle::make('is_featured')
                            ->label('Featured Project (Main Showcase)')
                            ->default(false),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),

                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client_name')
                    ->label('Client')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
