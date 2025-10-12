<?php
 
$numbers = [1, 2, 3, 4, 5];
print_r($numbers);
$a=array_map(fn($n) => $n ** 2, $numbers);
print_r($a);
for ($i=0; $i < count($a); $i++) { 
    if($i%2===1){
        echo("Чётное");
    }
    else{
        echo("         не чётное       ");
    }
}

?>