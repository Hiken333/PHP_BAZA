<?php

namespace App\Repository;

use App\Models\Task;
use Illuminate\Support\Facades\DB;

class MySqlTaskRepository implements TaskRepositoryInterface
{
    public function findAll(): array
    {
        $rows = DB::select('SELECT id, title, completed FROM tasks ORDER BY id DESC');
        
        $tasks = [];
        foreach ($rows as $row) {
            $task = new Task();
            $task->setAttribute('id', $row->id);
            $task->setAttribute('title', $row->title);
            $task->setAttribute('completed', (bool)$row->completed);
            $task->exists = true;
            $tasks[] = $task;
        }
        
        return $tasks;
    }

    public function add(Task $task): void
    {
        DB::insert('INSERT INTO tasks (title, completed, created_at, updated_at) VALUES (?, ?, NOW(), NOW())', [
            $task->title,
            $task->completed ? 1 : 0,
        ]);
    }
}

