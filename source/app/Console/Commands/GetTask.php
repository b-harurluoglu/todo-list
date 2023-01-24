<?php

namespace App\Console\Commands;

use App\Services\TaskService1;
use App\Services\TaskService2;
use Illuminate\Console\Command;

class GetTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It saves the tasks in the providers to the system.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        (new TaskService1())->execute();
        (new TaskService2())->execute();
        return Command::SUCCESS;
    }
}
