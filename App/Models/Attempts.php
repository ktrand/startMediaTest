<?php

namespace App\Models;

use App\jdb\Database;

class Attempts
{
    /**
     * Основной метод класса возвращает таблицу заездов
     * @return void
     */
    public function getTable():array
    {
        return $this->addTotalPointsAndBestRace(
                    $this->getBaseTable(
                        $this->getAttempts()
                    )
                );
    }

    /**
     * Метод добавляет общее количество очков участника и лучший заезд(можно было добавление лучшего заезда
     * убрать в отдельный метод, но лишний цикл не к чему)в таблицу
     * @return array
     */
    private function addTotalPointsAndBestRace(array $baseTable): array
    {
        foreach ($baseTable as $racerId => $data) {
            $baseTable[$racerId]['total_points'] = array_sum($data['races']);
            $baseTable[$racerId]['best_race'] = max($data['races']);
        }

        return $baseTable;
    }

    /**
     * Метод собирает результаты каждого участника, в результате получаем таблицу
     * 'участник' => ['заезд 1 ', ...]
     * @return array
     */
    private function getBaseTable(array  $attempts):array
    {
        foreach ($attempts as $attempt) {
            $table[$attempt['id']]['races'][] = $attempt['result'];
        }

        return $table ?? [];
    }

    /**
     * Метод достаёт данные из json файла.
     * @return array
     */
    private function getAttempts(): array
    {
     $db = new Database();
     return $db->getData('attempts');
    }
}