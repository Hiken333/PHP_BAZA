<?php
$title = 'Добавить задачу';
ob_start();
?>

<div class="task-add-page">
    <div class="page-header">
        <h2 class="page-title">Добавить новую задачу</h2>
        <a href="<?= route('task.list') ?>" class="btn btn-secondary">
            <span class="btn-icon">←</span>
            Назад к списку
        </a>
    </div>
    
    <div class="form-wrapper">
        <form method="POST" action="<?= route('task.add') ?>" class="task-form" id="taskForm">
            <input type="hidden" name="_token" value="<?= csrf_token() ?>">
            
            <?php if (!empty($errors)): ?>
                <div class="alert alert-error" role="alert">
                    <span class="alert-icon">⚠</span>
                    <div class="alert-content">
                        <strong>Ошибки валидации:</strong>
                        <ul class="error-list">
                            <?php 
                            $allErrors = [];
                            foreach ($errors as $fieldErrors) {
                                if (is_array($fieldErrors)) {
                                    $allErrors = array_merge($allErrors, $fieldErrors);
                                } else {
                                    $allErrors[] = $fieldErrors;
                                }
                            }
                            foreach ($allErrors as $error): 
                            ?>
                                <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
            
            <div class="form-group">
                <label for="title" class="form-label">
                    Название задачи
                    <span class="required">*</span>
                </label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    class="form-input <?= isset($errors['title']) ? 'input-error' : '' ?>"
                    placeholder="Введите название задачи (минимум 3 символа)"
                    value="<?= htmlspecialchars($old['title'] ?? '') ?>"
                    required
                    autofocus
                    minlength="3"
                    maxlength="255"
                >
                <?php if (isset($errors['title'])): ?>
                    <div class="form-error">
                        <?php foreach ($errors['title'] as $error): ?>
                            <span class="error-text"><?= htmlspecialchars($error) ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <div class="form-hint">Минимум 3 символа, максимум 255 символов</div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary btn-large">
                    <span class="btn-icon">✓</span>
                    Добавить задачу
                </button>
                <a href="<?= route('task.list') ?>" class="btn btn-secondary btn-large">
                    Отмена
                </a>
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/app.php';
?>

