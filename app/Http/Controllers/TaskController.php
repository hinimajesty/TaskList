<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTaskRequest;
use App\Http\Requests\EditTaskRequest;
use App\Models\Task;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    public function index()
    {
        //TODO:write custom query builder 

        $status = request('status');
        $createdAt = request('created_at');
        $taskListId = request('task_list_id');

        $tasks = Task::whereNot('id',null);

        if($taskListId)
        {
            $tasks = Task::whereTaskListId($taskListId); 
        }

        if($createdAt)
        {
            $tasks = $tasks->whereDate('created_at',$createdAt);
        }

        if($status == '0')
        {
            $tasks = $tasks->onlyTrashed();
        }
        
        $tasks = $tasks->get();
        
        return response()->json([
            'status' => 200, 
            'data' => TaskResource::collection($tasks), 
            'message' => 'Tasks retrieved successfully'
        ]);
    }

    public function store(AddTaskRequest $request)
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

    public function update(EditTaskRequest $request)
    {
        $task = Task::whereId(request('taskId'))->first(); 

        if(!$task)
        {
            return response()->json([
                'status' => 404,
                'data' => [],
                'message' => 'No task found with id specified'
            ],404);
        }

        $task->title = request('title') ?? $task->title; 
        $task->description = request('description') ?? $task->description;
        $task->task_list_id = request('newTaskListId') ?? $task->task_list_id;
        
        $task->save();

        return response()->json([
            'status' => 200,
            'data' => new TaskResource($task->refresh()),
            'message' => 'Task updated successfully'
        ],200);
    }
}
