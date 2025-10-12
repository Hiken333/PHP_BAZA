<?php

class StringUtils {
    public static function isPalindrome($s) {
        $s = mb_strtolower(str_replace(' ', '', $s));
        return $s === strrev($s);
    }
}

$test1 = "Level";
$test2 = "Мадам";
$test3 = "Тест";

$result1 = StringUtils::isPalindrome($test1) ? "да" : "нет";
$result2 = StringUtils::isPalindrome($test2) ? "да" : "нет";
$result3 = StringUtils::isPalindrome($test3) ? "да" : "нет";

echo("'$test1' - палиндром: $result1");
echo("'$test2' - палиндром: $result2");
echo("'$test3' - палиндром: $result3");

?>
