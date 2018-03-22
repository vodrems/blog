<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyTask;
use App\Http\Requests\SaveTask;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    /**
     * @param Task $task
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Task $task)
    {

        $tasks = $task->orderBy('created_at', 'desc')->get();

        return view('tasks', [
            'tasks' => $tasks
        ]);
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
    public function store(SaveTask $request)
    {
        Auth::user()->tasks()->create($request->all());

        return redirect()->route('tasks.index')->with('msg', 'Your task have saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTask $request
     * @param Task $task
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(DestroyTask $request, Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('msg', 'Your task have deleted!');
    }
}
