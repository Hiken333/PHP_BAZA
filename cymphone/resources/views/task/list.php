<?php
$title = 'Список задач';
ob_start();
?>

<div class="task-list-page">
    <?php if (!empty($success)): ?>
        <div class="alert alert-success" role="alert">
            <span class="alert-icon">✓</span>
            <span class="alert-message"><?= htmlspecialchars($success) ?></span>
            <button class="alert-close" onclick="this.parentElement.remove()">×</button>
        </div>
    <?php endif; ?>
    
    <?php if (!empty($error)): ?>
        <div class="alert alert-error" role="alert">
            <span class="alert-icon">⚠</span>
            <span class="alert-message"><?= htmlspecialchars($error) ?></span>
            <button class="alert-close" onclick="this.parentElement.remove()">×</button>
        </div>
    <?php endif; ?>
    
    <div class="page-header">
        <h2 class="page-title">Мои задачи</h2>
        <a href="<?= route('task.add') ?>" class="btn btn-primary">
            <span class="btn-icon">+</span>
            Добавить задачу
        </a>
    </div>
    
    <?php if (empty($tasks)): ?>
        <div class="empty-state">
            <div class="empty-state-icon">📝</div>
            <h3 class="empty-state-title">Задач пока нет</h3>
            <p class="empty-state-text">Начните с добавления первой задачи</p>
            <a href="<?= route('task.add') ?>" class="btn btn-primary btn-large">
                <span class="btn-icon">+</span>
                Добавить первую задачу
            </a>
        </div>
    <?php else: ?>
        <div class="tasks-grid">
            <?php foreach ($tasks as $task): ?>
                <div class="task-card <?= $task->completed ? 'task-completed' : '' ?>">
                    <div class="task-card-header">
                        <div class="task-status-badge <?= $task->completed ? 'status-completed' : 'status-pending' ?>">
                            <?= $task->completed ? '✓' : '○' ?>
                        </div>
                        <?php if (isset($task->created_at)): ?>
                            <span class="task-date"><?= date('d.m.Y', strtotime($task->created_at)) ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="task-card-body">
                        <h3 class="task-title"><?= htmlspecialchars($task->title) ?></h3>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="tasks-stats">
            <div class="stat-item">
                <span class="stat-value"><?= count($tasks) ?></span>
                <span class="stat-label">Всего задач</span>
            </div>
            <div class="stat-item">
                <span class="stat-value"><?= count(array_filter($tasks, fn($t) => $t->completed)) ?></span>
                <span class="stat-label">Выполнено</span>
            </div>
            <div class="stat-item">
                <span class="stat-value"><?= count(array_filter($tasks, fn($t) => !$t->completed)) ?></span>
                <span class="stat-label">В работе</span>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/app.php';
?>

