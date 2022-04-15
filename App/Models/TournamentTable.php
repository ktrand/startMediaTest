<?php

namespace App\Models;

class TournamentTable
{
    private Attempts $attempts;
    private Car $car;

    public function __construct(){
        $this->attempts = new Attempts();
        $this->car = new Car();
    }

    /**
     * Метод возвращает турнирную таблицу сортированную по переданному параметру-ключу.
     * @param string $sort
     * @return array
     */
    public function getTable(string $sort = 'total_points'):array
    {
        $table = $this->createBaseTable($this->getAttemptsTable(), $this->getCarsTable());
        usort($table, function ($a, $b) use($sort){
            if ($a[$sort] === $b[$sort]) return 0;
            return $a[$sort] < $b[$sort] ? 1 : -1;
        });
        return $table;
    }

    /**
     * Метод мержит списки заездов и машин
     * @param array $attempts
     * @param array $cars
     * @return array
     */
    private function createBaseTable(array $attempts, array  $cars):array
    {
        $table = [];
        foreach ($attempts as $racerId => $attemptData){
            $table[$racerId] = array_merge($attemptData, $cars[$racerId]);
        }
        return $table;
    }

    /**
     * Получаем данные по заездам
     * @return array
     */
    private function getAttemptsTable():array
    {
        return $this->attempts->getTable();
    }

    /**
     * Получаем данные по машинам
     * @return array
     */
    private function getCarsTable():array
    {
        return $this->car->getTable();
    }
}