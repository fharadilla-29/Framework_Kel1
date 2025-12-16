<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleriResource\Pages;
use App\Filament\Resources\GaleriResource\RelationManagers;
use App\Models\Galeri;
use App\Models\Media;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class GaleriResource extends Resource
{
    protected static ?string $model = Galeri::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Galeri';

    protected static ?string $modelLabel = 'Galeri';

    protected static ?string $pluralModelLabel = 'Galeri';

    protected static ?string $navigationGroup = 'Media';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Galeri')
                    ->schema([
                        Forms\Components\TextInput::make('judul')
                            ->label('Judul Galeri')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Foto-foto Galeri')
                    ->schema([
                        Forms\Components\Repeater::make('media_fotos')
                            ->label('Daftar Foto')
                            ->relationship('fotos')
                            ->schema([
                                Forms\Components\FileUpload::make('path')
                                    ->label('Foto')
                                    ->image()
                                    ->disk('public')
                                    ->directory('galeri')
                                    ->visibility('public')
                                    ->imageEditor()
                                    ->maxSize(2048)
                                    ->required()
                                    ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg', 'image/webp']),
                            ])
                            ->defaultItems(0)
                            ->reorderable()
                            ->collapsible()
                            ->columnSpanFull()
                            ->mutateRelationshipDataBeforeCreateUsing(function (array $data, Galeri $record): array {
                                $data['ref_table'] = 'galeri';
                                $data['ref_id'] = $record->galeri_id;
                                $data['jenis'] = 'foto';
                                $data['nama_file'] = basename($data['path']);
                                $data['mime_type'] = Storage::disk('public')->mimeType($data['path']);
                                $data['ukuran'] = Storage::disk('public')->size($data['path']);
                                return $data;
                            })
                            ->mutateRelationshipDataBeforeSaveUsing(function (array $data): array {
                                $data['nama_file'] = basename($data['path']);
                                if (Storage::disk('public')->exists($data['path'])) {
                                    $data['mime_type'] = Storage::disk('public')->mimeType($data['path']);
                                    $data['ukuran'] = Storage::disk('public')->size($data['path']);
                                }
                                return $data;
                            })
                            ->helperText('Klik tombol + untuk menambah foto baru.'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('first_foto')
                    ->label('Cover')
                    ->state(function (Galeri $record): ?string {
                        $foto = $record->fotos()->first();
                        if ($foto && $foto->path) {
                            return asset('storage/' . $foto->path);
                        }
                        return null;
                    })
                    ->width(80)
                    ->height(60),
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fotos_count')
                    ->label('Jumlah Foto')
                    ->counts('fotos')
                    ->badge()
                    ->color('primary'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diupdate')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListGaleris::route('/'),
            'create' => Pages\CreateGaleri::route('/create'),
            'edit' => Pages\EditGaleri::route('/{record}/edit'),
        ];
    }
}
