<?php

namespace App\Models;

use App\jdb\Database;

class Car
{
    /**
     * Метод возвращает массив с ключом участника и его данными
     * @return array
     */
    public function getTable():array
    {
        $table = [];
        $data = $this->getCarsData();
        foreach ($data as $car){
            $table[$car['id']] = [
                'name' =>$car['name'],
                'city' => $car['city'],
                'car' => $car['car']
            ];
        }

        return $table;
    }
    /**
     * Метод достаёт данные из json файла.
     * @return array
     */
    public function getCarsData():array
    {
        return (new Database())->getData('cars');
    }

}