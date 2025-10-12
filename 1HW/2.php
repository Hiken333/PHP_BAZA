<?php
declare(strict_types=1);
function sum(int $a, int $b): int {
    return $a + $b;
}

$sum=sum(2,3);

echo(" Сумма:   $sum");
$sum=sum("2",3); //типизация строгая int

?>