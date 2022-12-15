<?php

namespace App\Http\Controllers;

use App\Models\TaskManagement;
use Illuminate\Http\Request;

class TaskManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_task = TaskManagement::all();

        return $all_task;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required'
        ]);

        $new_task = new TaskManagement;
        $new_task->task_name = $request->task_name;
        $new_task->task_description = $request->task_description;
        $new_task->date = $request->date;
        $new_task->time = $request->time;
        $new_task->reminder = $request->reminder;
        $new_task->assignee = $request->assignee;
        $new_task->sharing = json_encode($request->sharing);
        $new_task->followers = $request->followers;
        $new_task->tags = $request->tags;
        $new_task->client_project = $request->client_project;
        $new_task->priority = $request->priority;
        $new_task->save();

        return "Data Added Successfully";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $find_task = TaskManagement::where('id', $id)->first();

        return $find_task;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = TaskManagement::find($id);
        $task->task_name = $request->task_name;
        $task->task_description = $request->task_description;
        $task->date = $request->date;
        $task->time = $request->time;
        $task->reminder = $request->reminder;
        $task->assignee = $request->assignee;
        $task->sharing = json_encode($request->sharing);
        $task->followers = $request->followers;
        $task->tags = $request->tags;
        $task->client_project = $request->client_project;
        $task->priority = $request->priority;
        $task->save();

        return "Data Updated Successfully";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = TaskManagement::find($id);
        $task->delete();
        return "Task Deleted Successfully";
    }
}
