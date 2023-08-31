<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TesteResource\Pages;
use App\Filament\Resources\TesteResource\RelationManagers;
use App\Models\Teste;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Leandrocfe\FilamentPtbrFormFields\Money;

class TesteResource extends Resource
{
    protected static ?string $model = Teste::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Money::make('valor1')
                ->label('Valor')
                    ->live(),
                Money::make('valor2')
                    ->live(),
                Placeholder::make('Valor_1')
                    ->content(function ($get) {
                        return $get('valor1');
                    }),
                Placeholder::make('Valor_2')
                    ->content(function ($get) {
                        return $get('valor2');
                    }),
                Placeholder::make('soma')
                    ->label('Soma')
                    ->content(function ($get) {
                        $valor1 = $get('valor1');
                        $valor2 = $get('valor2');
                        $soma = 0;

                        $valor1_str = floatval(str_replace(['.', ','], ['', '.'], $valor1));
                        $valor2_str = floatval(str_replace(['.', ','], ['', '.'], $valor2));
                        $total_fatura = $valor1_str + $valor2_str;
                        $soma = 'R$ ' . number_format($total_fatura, 2, ',', '.');
                        return $soma;
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('valor1')
                    ->money('brl'),
                    TextColumn::make('valor2')
                    ->money('brl'),
                    TextColumn::make('soma')
                    ->money('brl'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListTestes::route('/'),
            'create' => Pages\CreateTeste::route('/create'),
            'edit' => Pages\EditTeste::route('/{record}/edit'),
        ];
    }
}
