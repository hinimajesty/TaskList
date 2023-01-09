<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTaskListRequest;
use App\Models\TaskList;
use App\Http\Resources\TaskListResource;

class TaskListController extends Controller
{
    public function index()
    {
        $taskLists = TaskList::get(); 
        
        return response()->json([
            'status' => 200, 
            'data' => TaskListResource::collection($taskLists), 
            'message' => 'Task Lists retrieved successfull'
        ]);
    }

    public function store(AddTaskListRequest $request)
    {
        $taskList = TaskList::create([
            'title' => request('title')
        ]);

        return response()->json([
            'status' => 200,
            'data' => new TaskListResource($taskList),
            'message' => 'Task List Created'
        ]); 
    }

    public function destroy()
    {
        TaskList::whereId(request('id'))->delete();

        return response()->json([
            'status' => 200, 
            'data' => [],
            'message' => 'Task List deleted successfully'
        ]);
    }
}
