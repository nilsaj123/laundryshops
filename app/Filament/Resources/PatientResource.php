<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientResource\Pages;
use App\Filament\Resources\PatientResource\RelationManagers;
use App\Models\Patient;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use App\Models\Vaccination;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan('full'),
                Forms\Components\DatePicker::make('date_of_birth'),

                Forms\Components\TextInput::make('birth_place')
                    ->maxLength(255),
                Forms\Components\TextInput::make('age_month')
                    ->numeric()
                    ->maxLength(255),
                Forms\Components\TextInput::make('age_year')
                    ->numeric()
                    ->maxLength(255),
                Forms\Components\Select::make('gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',

                    ]),
                Forms\Components\Select::make('type_of_vaccine')
                    ->options([
                        'BGG' => 'BGG',
                        'HEPATITIS B' => 'HEPATITIS B',
                        'PENTAVALENT' => 'PENTAVALENT',
                        'ORAL POLIO' => 'ORAL POLIO',
                        'PCV' => 'PCV',
                        'INACTIVE POLIO' => 'INACTIVE POLIO',
                   
                        'MMR' => 'MMR',
                        

                    
                    ]),
                Forms\Components\TextInput::make('height')
                    ->numeric()
                    ->maxLength(255),
                Forms\Components\TextInput::make('weight')
                    ->numeric()
                    ->maxLength(255),

                Forms\Components\TextInput::make('permanent_address')
                    ->maxLength(255)
                    ->columnSpan('full'),

                Forms\Components\TextInput::make('parents_name')
                    ->maxLength(255)
                   ,
                Forms\Components\TextInput::make('parent_age')
                    ->numeric()
                    ->maxLength(255),
                Forms\Components\TextInput::make('parents_number')
                    ->numeric()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('updated_at'),




            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              

                Tables\Columns\TextColumn::make('name')->searchable(),

                Tables\Columns\TextColumn::make('date_of_birth')->date()->searchable(),

                Tables\Columns\TextColumn::make('birth_place')->searchable(),

                Tables\Columns\TextColumn::make('age_year')->searchable()
                ->formatStateUsing(fn ($state) => $state . ' years old'),
                Tables\Columns\TextColumn::make('age_month')->searchable()

                ->formatStateUsing(fn ($state) => $state . ' months old'),

                Tables\Columns\TextColumn::make('height')
                ->searchable()
                ->formatStateUsing(fn ($state) => $state . ' cm'),
            
            Tables\Columns\TextColumn::make('weight')
                ->searchable()
                ->formatStateUsing(fn ($state) => $state . ' kg'),
                Tables\Columns\TextColumn::make('parents_name')->searchable(),
                Tables\Columns\TextColumn::make('parent_age')->searchable(),
                Tables\Columns\TextColumn::make('permanent_address')->searchable(),
                Tables\Columns\TextColumn::make('parents_number')->searchable(),
                Tables\Columns\TextColumn::make('type_of_vaccine')->searchable(),
              
               
                Tables\Columns\TextColumn::make('gender')->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->searchable(),


                //
            ])
            ->filters([
            
            ])
            ->actions([

                Tables\Actions\EditAction::make(),

                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('name', 'asc'); // Optional: Define default sorting if needed.
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
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
        ];
    }
}
