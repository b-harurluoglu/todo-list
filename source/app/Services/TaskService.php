<?php 

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\Http;

abstract class TaskService
{
    private $url;
    private $data;
    private $cleanData;
    abstract public function makeItFit($data);

    protected function setUrl($url)
    {
        $this->url = $url;
    }

    protected function getData()
    {
        return $this->data;
    }

    protected function setCleanData($cleanData)
    {
        return $this->cleanData = $cleanData;
    }

    private function run()
    {
        $this->data = Http::get($this->url)->json();
    } 

    private function save()
    {
        Task::insert($this->cleanData);
    }
    
    public function execute()
    {
        $this->run();
        $this->setCleanData($this->makeItFit($this->data));
        $this->save();
    }
}