<?php
declare(strict_types=1);
echo("Hello, PHP!");
function sum(int $a, int $b): int {
    return $a + $b;
}
// $a=2;
// $b=3;
$sum=sum(2,3);

echo(" Сумма:   $sum");

?>