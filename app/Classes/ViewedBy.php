<?php
namespace App\Classes;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\TaskView;
use App\Task;
use Illuminate\Support\Facades\Auth;

class ViewedBy
{
    public static function insert_to_viewed($task_id, $user_id)
    {
        $task = TaskView::updateOrCreate(['task_id' => $task_id, 'user_id' => $user_id]);
        $task->user_id = $user_id;
        $task->task_id = $task_id;
        $task->save();
    }
    public static function insert_viewed($task_id)
    {
        $task = Task::updateOrCreate(['id' => $task_id]);
        $task->status = 'viewed';
        $task->save();
    }
}
