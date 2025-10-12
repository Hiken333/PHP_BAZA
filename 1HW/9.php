<?php

class User {
    public $name;
    public $email;
    
    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }
    
    public function getInfo() {
        return "Имя: " . $this->name . ", Email: " . $this->email;
    }
}

$user = new User("Иван Петров", "ivan@example.com");
$info = $user->getInfo();
echo($info);

?>
