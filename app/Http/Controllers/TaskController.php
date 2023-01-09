<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::whereTaskListId(request('task_list_id'))->get(); 

        return response()->json([
            'status' => 200, 
            'data' => TaskResource::collection($tasks), 
            'message' => 'Tasks retrieved successfully'
        ]);
    }

    public function store()
    {
        $task = Task::create([
            'title' => request('title'), 
            'description' => request('description'), 
            'task_list_id' => request('taskListId')
        ]);

        return response()->json([
            'status' => 200,
            'data' => new TaskResource($task),
            'message' => 'Task List Created'
        ]); 
    }
}
