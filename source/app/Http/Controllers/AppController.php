<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Developer;
use Illuminate\Http\Request;
use ElGigi\HungarianAlgorithm\Hungarian;

class AppController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('level', 'desc')->get();
        $developers = Developer::get();
        $totalTaskHour = $tasks->sum('duration');
        $plans = Task::generateWeeklyPlan($tasks, $totalTaskHour, $developers);

        return view('index')->with('plans', $plans)->with('developers', $developers);
    }
}
