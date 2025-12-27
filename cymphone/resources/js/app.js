// УЖАСНЫЙ JAVASCRIPT С РАЗДРАЖАЮЩИМИ ЭФФЕКТАМИ И ЗВУКАМИ
document.addEventListener('DOMContentLoaded', function() {
    
    // ========== УЖАСНАЯ СИСТЕМА ЗВУКОВ ==========
    const audioContext = new (window.AudioContext || window.webkitAudioContext)();
    
    // Функция для создания ужасных звуков
    function playHorribleSound(type) {
        try {
            const oscillator = audioContext.createOscillator();
            const gainNode = audioContext.createGain();
            
            oscillator.connect(gainNode);
            gainNode.connect(audioContext.destination);
            
            switch(type) {
                case 'click':
                    // Пронзительный писк
                    oscillator.type = 'sawtooth';
                    oscillator.frequency.setValueAtTime(800, audioContext.currentTime);
                    oscillator.frequency.exponentialRampToValueAtTime(2000, audioContext.currentTime + 0.1);
                    gainNode.gain.setValueAtTime(0.3, audioContext.currentTime);
                    gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.2);
                    oscillator.start();
                    oscillator.stop(audioContext.currentTime + 0.2);
                    break;
                    
                case 'button':
                    // Громкий бип
                    oscillator.type = 'square';
                    oscillator.frequency.setValueAtTime(400, audioContext.currentTime);
                    oscillator.frequency.setValueAtTime(600, audioContext.currentTime + 0.05);
                    oscillator.frequency.setValueAtTime(400, audioContext.currentTime + 0.1);
                    gainNode.gain.setValueAtTime(0.5, audioContext.currentTime);
                    gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.15);
                    oscillator.start();
                    oscillator.stop(audioContext.currentTime + 0.15);
                    break;
                    
                case 'hover':
                    // Противный скрип
                    oscillator.type = 'sine';
                    oscillator.frequency.setValueAtTime(300, audioContext.currentTime);
                    oscillator.frequency.linearRampToValueAtTime(600, audioContext.currentTime + 0.1);
                    gainNode.gain.setValueAtTime(0.2, audioContext.currentTime);
                    gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.1);
                    oscillator.start();
                    oscillator.stop(audioContext.currentTime + 0.1);
                    break;
                    
                case 'error':
                    // Резкий звук ошибки
                    oscillator.type = 'square';
                    oscillator.frequency.setValueAtTime(200, audioContext.currentTime);
                    oscillator.frequency.setValueAtTime(100, audioContext.currentTime + 0.05);
                    oscillator.frequency.setValueAtTime(200, audioContext.currentTime + 0.1);
                    oscillator.frequency.setValueAtTime(100, audioContext.currentTime + 0.15);
                    gainNode.gain.setValueAtTime(0.6, audioContext.currentTime);
                    gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.2);
                    oscillator.start();
                    oscillator.stop(audioContext.currentTime + 0.2);
                    break;
                    
                case 'success':
                    // Противный успешный звук
                    oscillator.type = 'triangle';
                    oscillator.frequency.setValueAtTime(523.25, audioContext.currentTime); // C
                    oscillator.frequency.setValueAtTime(659.25, audioContext.currentTime + 0.1); // E
                    oscillator.frequency.setValueAtTime(783.99, audioContext.currentTime + 0.2); // G
                    gainNode.gain.setValueAtTime(0.4, audioContext.currentTime);
                    gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.3);
                    oscillator.start();
                    oscillator.stop(audioContext.currentTime + 0.3);
                    break;
                    
                case 'type':
                    // Раздражающий звук печати
                    oscillator.type = 'sawtooth';
                    oscillator.frequency.setValueAtTime(600 + Math.random() * 200, audioContext.currentTime);
                    gainNode.gain.setValueAtTime(0.15, audioContext.currentTime);
                    gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.05);
                    oscillator.start();
                    oscillator.stop(audioContext.currentTime + 0.05);
                    break;
                    
                case 'random':
                    // Случайный ужасный звук
                    oscillator.type = ['sine', 'square', 'sawtooth', 'triangle'][Math.floor(Math.random() * 4)];
                    oscillator.frequency.setValueAtTime(200 + Math.random() * 1000, audioContext.currentTime);
                    oscillator.frequency.linearRampToValueAtTime(200 + Math.random() * 1000, audioContext.currentTime + 0.2);
                    gainNode.gain.setValueAtTime(0.3 + Math.random() * 0.3, audioContext.currentTime);
                    gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.2);
                    oscillator.start();
                    oscillator.stop(audioContext.currentTime + 0.2);
                    break;
                    
                case 'popup':
                    // Звук всплывающего окна
                    oscillator.type = 'square';
                    oscillator.frequency.setValueAtTime(1000, audioContext.currentTime);
                    oscillator.frequency.exponentialRampToValueAtTime(200, audioContext.currentTime + 0.3);
                    gainNode.gain.setValueAtTime(0.5, audioContext.currentTime);
                    gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.3);
                    oscillator.start();
                    oscillator.stop(audioContext.currentTime + 0.3);
                    break;
            }
        } catch(e) {
            console.log('Звук не может быть воспроизведен:', e);
        }
    }
    
    // Автоматическое воспроизведение при первом взаимодействии
    let audioEnabled = false;
    function enableAudio() {
        if (!audioEnabled) {
            audioContext.resume();
            playHorribleSound('click');
            audioEnabled = true;
        }
    }
    
    // Звуки при клике везде
    document.addEventListener('click', function(e) {
        enableAudio();
        
        if (e.target.classList.contains('btn') || e.target.closest('.btn')) {
            playHorribleSound('button');
        } else if (e.target.classList.contains('task-card') || e.target.closest('.task-card')) {
            playHorribleSound('click');
        } else if (e.target.classList.contains('alert-close')) {
            playHorribleSound('error');
        } else {
            playHorribleSound('click');
        }
        
        // Вращение элементов при клике
        if (e.target.tagName !== 'BUTTON' && e.target.tagName !== 'A' && e.target.tagName !== 'INPUT') {
            e.target.style.animation = 'rotate 0.5s linear';
            setTimeout(() => {
                e.target.style.animation = '';
            }, 500);
        }
    }, true);
    
    // Звуки при наведении
    document.addEventListener('mouseover', function(e) {
        enableAudio();
        
        if (e.target.classList.contains('btn') || e.target.closest('.btn')) {
            playHorribleSound('hover');
        } else if (e.target.classList.contains('task-card') || e.target.closest('.task-card')) {
            if (Math.random() > 0.7) {
                playHorribleSound('hover');
            }
        }
    }, true);
    
    // Звуки при вводе текста
    document.addEventListener('input', function(e) {
        enableAudio();
        if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA') {
            playHorribleSound('type');
        }
    }, true);
    
    // Звуки при фокусе
    document.addEventListener('focus', function(e) {
        enableAudio();
        if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA') {
            playHorribleSound('hover');
        }
    }, true);
    
    // Звуки при отправке формы
    document.addEventListener('submit', function(e) {
        enableAudio();
        playHorribleSound('success');
    }, true);
    
    // Мигающий курсор
    const cursor = document.createElement('div');
    cursor.style.cssText = 'position: fixed; width: 20px; height: 20px; background: #ff00ff; border: 5px solid #ffff00; border-radius: 50%; pointer-events: none; z-index: 99999; animation: blink 0.5s infinite;';
    document.body.appendChild(cursor);
    
    document.addEventListener('mousemove', function(e) {
        cursor.style.left = e.clientX + 'px';
        cursor.style.top = e.clientY + 'px';
    });
    
    // Случайные всплывающие окна со звуками
    setInterval(function() {
        if (Math.random() > 0.7) {
            enableAudio();
            playHorribleSound('popup');
            
            const popup = document.createElement('div');
            popup.style.cssText = 'position: fixed; top: ' + Math.random() * 500 + 'px; left: ' + Math.random() * 500 + 'px; background: #ffff00; color: #ff0000; padding: 20px; border: 10px solid #ff00ff; z-index: 99998; font-size: 2rem; font-weight: 900; animation: shake 0.1s infinite;';
            popup.textContent = 'CLICK ME!!!';
            popup.onclick = function() {
                playHorribleSound('button');
                this.remove();
            };
            document.body.appendChild(popup);
            setTimeout(() => {
                playHorribleSound('error');
                popup.remove();
            }, 3000);
        }
    }, 5000);
    
    // Случайные звуки
    setInterval(function() {
        if (Math.random() > 0.9) {
            enableAudio();
            playHorribleSound('random');
        }
    }, 3000);
    
    // Мигающий текст
    const titles = document.querySelectorAll('h1, h2, h3');
    titles.forEach(title => {
        setInterval(() => {
            title.style.color = title.style.color === 'red' ? 'blue' : 'red';
        }, 500);
    });
    
    // Случайное изменение размеров
    setInterval(function() {
        const elements = document.querySelectorAll('.btn, .task-card');
        elements.forEach(el => {
            if (Math.random() > 0.8) {
                el.style.transform = 'scale(' + (0.8 + Math.random() * 0.4) + ') rotate(' + (Math.random() * 20 - 10) + 'deg)';
            }
        });
    }, 2000);
    
    // Авто-скрытие алертов с ужасной анимацией и звуком
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            enableAudio();
            playHorribleSound('error');
            alert.style.animation = 'rotate 1s linear, shake 0.1s infinite';
            alert.style.transform = 'scale(2) rotate(360deg)';
            setTimeout(() => {
                alert.remove();
            }, 1000);
        }, 5000);
    });
    
    // Форма валидация с ужасными эффектами и звуками
    const taskForm = document.getElementById('taskForm');
    if (taskForm) {
        const titleInput = taskForm.querySelector('#title');
        if (titleInput) {
            titleInput.addEventListener('input', function() {
                enableAudio();
                const value = this.value.trim();
                if (value.length < 3 && value.length > 0) {
                    playHorribleSound('error');
                    this.style.animation = 'shake 0.1s infinite';
                    this.style.background = '#ff0000';
                    this.style.color = '#ffff00';
                    this.setCustomValidity('МИНИМУМ 3 СИМВОЛА!!!');
                } else {
                    playHorribleSound('type');
                    this.style.animation = '';
                    this.style.background = '#ffff00';
                    this.style.color = '#000';
                    this.setCustomValidity('');
                }
            });
            
            titleInput.addEventListener('focus', function() {
                enableAudio();
                playHorribleSound('hover');
                this.style.transform = 'scale(1.5) rotate(5deg)';
                this.style.border = '20px solid #ff00ff';
            });
            
            titleInput.addEventListener('blur', function() {
                this.style.transform = '';
                this.style.border = '10px ridge #ff00ff';
            });
        }
    }
    
    // Случайные цвета фона
    setInterval(function() {
        const colors = ['#ff0000', '#00ff00', '#0000ff', '#ffff00', '#ff00ff', '#00ffff'];
        document.body.style.background = colors[Math.floor(Math.random() * colors.length)];
    }, 3000);
    
    // Добавление звездочек везде
    function addStars() {
        for (let i = 0; i < 50; i++) {
            const star = document.createElement('div');
            star.textContent = '★';
            star.style.cssText = 'position: fixed; top: ' + Math.random() * window.innerHeight + 'px; left: ' + Math.random() * window.innerWidth + 'px; color: #ffff00; font-size: ' + (10 + Math.random() * 30) + 'px; z-index: 99997; pointer-events: none; animation: rotate ' + (2 + Math.random() * 3) + 's linear infinite;';
            document.body.appendChild(star);
        }
    }
    addStars();
    
    // Прыгающие кнопки со звуками
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(btn => {
        setInterval(() => {
            if (Math.random() > 0.5) {
                btn.style.marginTop = (Math.random() * 20 - 10) + 'px';
                btn.style.marginLeft = (Math.random() * 20 - 10) + 'px';
            }
        }, 1000);
        
        // Звук при наведении на кнопку
        btn.addEventListener('mouseenter', function() {
            enableAudio();
            playHorribleSound('hover');
        });
    });
    
    // Звуки при загрузке страницы
    setTimeout(() => {
        enableAudio();
        playHorribleSound('success');
        playHorribleSound('popup');
    }, 500);
    
    // Звуки при скролле
    let lastScrollTime = 0;
    window.addEventListener('scroll', function() {
        const now = Date.now();
        if (now - lastScrollTime > 200) {
            enableAudio();
            if (Math.random() > 0.7) {
                playHorribleSound('hover');
            }
            lastScrollTime = now;
        }
    });
    
    // Звуки при изменении размера окна
    window.addEventListener('resize', function() {
        enableAudio();
        playHorribleSound('random');
    });
});
