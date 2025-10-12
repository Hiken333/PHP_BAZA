<?php

class MathUtils {
    public static function square($x) {
        return $x * $x;
    }
}

$result = MathUtils::square(5);
echo("Квадрат числа 5: $result");

$result2 = MathUtils::square(3.5);
echo("Квадрат числа 3.5: $result2");

?>
