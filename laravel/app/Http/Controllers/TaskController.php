<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Repository\TaskRepositoryInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private TaskRepositoryInterface $repository;

    public function __construct(TaskRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function list()
    {
        $tasks = $this->repository->findAll();
        return view('task.list', compact('tasks'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'title' => 'required|string|max:255',
            ]);

            $task = new Task();
            $task->setAttribute('title', $request->title);
            $task->setAttribute('completed', false);
            
            $this->repository->add($task);

            return redirect()->route('task.list')->with('success', 'Задача успешно добавлена!');
        }

        return view('task.add');
    }
}
