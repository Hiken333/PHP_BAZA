<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= csrf_token() ?>">
    <title><?= $title ?? 'Менеджер задач' ?></title>
    <style><?= file_get_contents(dirname(__DIR__, 2) . '/css/app.css') ?></style>
</head>
<body>
    <div class="app-container">
        <header class="app-header">
            <div class="container">
                <h1 class="app-title">
                    <span class="icon">★</span>
                    МЕНЕДЖЕР ЗАДАЧ!!!
                </h1>
            </div>
        </header>
        
        <main class="app-main">
            <div class="container">
                <?= $content ?? '' ?>
            </div>
        </main>
        
        <footer class="app-footer">
            <div class="container">
                <p>© <?= date('Y') ?>  ВСЕ ПРАВА НЕ ЗАЩИЩЕНЫ, ВЫ ПОД УГРОЗОЙ!!!</p>
            </div>
        </footer>
    </div>
    
    <script><?= file_get_contents(dirname(__DIR__, 2) . '/js/app.js') ?></script>
</body>
</html>

