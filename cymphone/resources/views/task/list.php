<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список задач</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            margin-top: 0;
        }
        .btn-add {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .btn-add:hover {
            background-color: #45a049;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            padding: 15px;
            margin-bottom: 8px;
            background-color: #fff;
            border-radius: 4px;
            border-left: 4px solid #ff9800;
            display: flex;
            align-items: center;
        }
        li.completed {
            border-left-color: #4CAF50;
            opacity: 0.8;
        }
        .task-status {
            margin-right: 10px;
            font-size: 18px;
        }
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #999;
        }
        .success-message {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Список задач</h1>
        
        <?php if (!empty($success)): ?>
            <div class="success-message"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
        
        <a href="<?= route('task.add') ?>" class="btn-add">+ Добавить задачу</a>
        
        <?php if (empty($tasks)): ?>
            <div class="empty-state">
                <p>Задач пока нет.</p>
                <p><a href="<?= route('task.add') ?>" class="btn-add">Добавьте первую задачу</a></p>
            </div>
        <?php else: ?>
            <ul>
                <?php foreach ($tasks as $task): ?>
                    <li class="<?= $task->completed ? 'completed' : '' ?>">
                        <span class="task-status">
                            <?= $task->completed ? '✔' : '❌' ?>
                        </span>
                        <span><?= htmlspecialchars($task->title) ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</body>

</html>

