<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Discussion;
use App\Models\Answer;
use App\Models\User;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Discussions', Discussion::count()),
            Stat::make('Answers', Answer::count()),
            Stat::make('Users', User::count()),
        ];
    }
}
