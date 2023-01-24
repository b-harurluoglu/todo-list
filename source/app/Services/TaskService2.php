<?php

namespace App\Services;

use App\Services\TaskService;

class TaskService2 extends TaskService
{
    public function __construct()
    {
        $this->setUrl('http://www.mocky.io/v2/5d47f235330000623fa3ebf7');
    }

    public function makeItFit($data): array
    {
        return collect($this->getData())->map(function ($item) {
      
                                return [
                                    'name' => array_keys($item)[0],
                                    'level' => $item[array_keys($item)[0]]['level'],
                                    'duration' => $item[array_keys($item)[0]]['estimated_duration']
                                ];
                        })->toArray();
    }
}