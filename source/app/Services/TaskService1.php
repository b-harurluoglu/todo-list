<?php

namespace App\Services;

use App\Services\TaskService;

class TaskService1 extends TaskService
{
    public function __construct()
    {
        $this->setUrl('http://www.mocky.io/v2/5d47f24c330000623fa3ebfa');
    }

    public function makeItFit($data): array
    {
        return collect($data)->map(function ($item) {
                                return [
                                    'name' => $item['id'],
                                    'level' => $item['zorluk'],
                                    'duration' => $item['sure']
                                ];
                        })->toArray();
    }
}