<?php
require_once "ArithmeticProgression.php";

$arProg_3 = new ArithmeticProgression(3);
$arProg_5 = new ArithmeticProgression(5);

$sum_3 = $arProg_3->tryGetSumPrevValue(10);
$sum_5 = $arProg_5->tryGetSumPrevValue(10);

$sum = $sum_3 + $sum_5;
echo "S(10) = $sum\n";

$arProg_15 = new ArithmeticProgression(15);

$sum_3 = $arProg_3->tryGetSumPrevValue(1000);
$sum_5 = $arProg_5->tryGetSumPrevValue(1000);
$sum_15 = $arProg_5->tryGetSumPrevValue(1000);

$sum = $sum_3 + $sum_5 - $sum_15;
echo "S(1000) = $sum\n";

$arProg_3 = null;
$arProg_5 = null;
$arProg_15 = null;
