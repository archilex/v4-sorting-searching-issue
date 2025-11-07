<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\Status;
use App\Models\User;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                CheckboxList::make('statuses')
                    ->options(Status::class)
                    ->live()
                    ->bulkToggleable()
                    ->helperText('Click "Select All" and see how "Draft" is duplicated in the list below. Then save to see 5 statuses in the array instead of 4.'),
                Text::make('statusesList')
                    ->content(function (Get $get) {
                        $statuses = $get('statuses') ?? [];
                        return 'Selected statuses: ' . implode(', ', array_map(fn (Status $status) => $status->getLabel(), $statuses));
                    })
            ]);
    }
}
