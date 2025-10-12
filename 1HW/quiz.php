<?php
$n = $_GET['n'];
$n = intval($n);
switch ($n) {
    case $n % 15 === 0:
        echo ("FizzBuzz");
        break;
    case $n % 5 === 0:
        echo ("Buzz");
        break;
    case $n % 3 === 0:
        echo ("Fizz");
        break;



    default:
        echo ("$n");
        break;
}
