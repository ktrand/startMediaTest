<?php

namespace App\Controllers;

use App\Models\TournamentTable;

class RaceController
{
    public function getTournamentTable():array
    {
        $TT = new TournamentTable();
        $result = [
            'main' => $TT->getTable(),
            'best_race_sorted' => $TT->getTable('best_race')
        ];
        return $result;
    }
}