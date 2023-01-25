<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    const WEEKLY_WORKING_HOURS = 45;

    public static function generateWeeklyPlan($tasks, $totalTaskHour, $developers)
    {
        $plans = collect();
        $averageWeek = self::getAverageWeek($totalTaskHour, count($developers));

        for ($week = 1; $week <= $averageWeek; $week++) {
            foreach ($developers as $developer) {
                $hours = 0;
                foreach ($tasks as $task) {
                    if($task->level <= $developer->competence  
                        && $hours + $task->duration <= self::WEEKLY_WORKING_HOURS) 
                    {
                        $plans->push(
                            [
                                'week'      => $week,
                                'developer' => $developer->name,
                                'task'      => $task->name,
                            ]
                        );
                        $hours += $task->duration;
                        $tasks = $tasks->except($task->id);
                    }
                }
                    
            }
        }


        $plans = $plans->groupBy('week');
        
        return $plans;
    }

    public static function getAverageWeek($totalTaskHour,$developerCount)
    {
        return ceil($totalTaskHour / (self::WEEKLY_WORKING_HOURS * $developerCount));
    }

}
