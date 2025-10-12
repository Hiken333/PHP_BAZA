<?php
function grade(int $score): string{
return match (true) {
    $score >= 90 => 'A',
    $score >= 75 => 'B',
    $score >= 60 => 'C',
    default => 'F',
};
}

$a=grade(95);
$b=grade(75);
$c=grade(50);
echo("$a , $b , $c ")
?>