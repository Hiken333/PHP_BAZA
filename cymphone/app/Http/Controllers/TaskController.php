<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Repository\TaskRepositoryInterface;
use Cymphone\Http\Request;
use Cymphone\Http\Response;
use Cymphone\Validation\Validator;
use Cymphone\View\View;

class TaskController extends Controller
{
    private TaskRepositoryInterface $repository;

    public function __construct(TaskRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function list(Request $request): Response
    {
        $tasks = $this->repository->findAll();
        $success = $request->getFlash('success');
        
        $content = View::make('task.list', [
            'tasks' => $tasks,
            'success' => $success,
        ]);
        
        return Response::make($content);
    }

    public function add(Request $request): Response
    {
        if ($request->isMethod('post')) {
            $validator = new Validator($request, [
                'title' => 'required|string|max:255',
            ]);

            if (!$validator->validate()) {
                $content = View::make('task.add', [
                    'errors' => $validator->errors(),
                    'old' => $request->all(),
                ]);
                
                return Response::make($content);
            }

            $task = new Task();
            $task->setAttribute('title', $request->input('title'));
            $task->setAttribute('completed', false);
            
            $this->repository->add($task);

            $request->flash('success', 'Задача успешно добавлена!');
            
            return Response::make('')->redirect('/task/list');
        }

        $content = View::make('task.add', [
            'errors' => [],
            'old' => [],
        ]);
        
        return Response::make($content);
    }
}

