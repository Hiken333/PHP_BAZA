<?php
function divide(float $a, float $b): ?float {
    return $b === 0.0 ? null : $a / $b;
}
$div=divide(1.1,0);
if($div===null){
    echo("Ошибка деления на ноль");

}

else{
echo("див: $div");
}
?>