<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyTask;
use App\Http\Requests\SaveTask;
use App\Http\Requests\UpdateTask;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\TaskRepositoryInterface;

class TasksController extends Controller
{
    private $tasks;

    public function __construct(TaskRepositoryInterface $tasks) {
        $this->tasks = $tasks;
    }

    /**
     * @param Task $task
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tasks = $this->tasks->all();

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
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SaveTask $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SaveTask $request)
    {
        $this->tasks->store($request->all());

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
     * @param Task $task
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Task $task)
    {
        if (Auth::user()->can('update', $task)) {
            return view('tasks.edit', [
                'task' => $task
            ]);
       } else {
            return redirect()->route('tasks.index')->with('msg', 'Access denied!');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTask $request
     * @param Task $task
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateTask $request, Task $task)
    {
       if ($this->tasks->update($task, $request->all())) {
            return redirect()->route('tasks.index')->with('msg', 'Task has updated!');
       }
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
