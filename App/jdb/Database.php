<?php

namespace App\jdb;

class Database
{
    private string $carsFile = '/data_cars.json';
    private string $attemptsFile = '/data_attempts.json';

    public function getData(string $file): array
    {
        $filename = $file === 'cars' ? $this->carsFile : $this->attemptsFile;
        $content = file_get_contents(__DIR__ . $filename);
        $result = json_decode($content, true);

        return  $result ?? [];
    }
}