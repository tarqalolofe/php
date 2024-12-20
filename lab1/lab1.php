<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home workm 1</title>
</head>
<body>
<?php

$name = "Tareq";
$age = 20;
if ($age >= 18) {
    echo "$name man.<br>";
} else {
    echo "$name kid.<br>";
}


echo "استخدام for:<br>";
for ($i = 1; $i <= 3; $i++) {
    echo "التكرار رقم: $i<br>";
}


echo "استخدام while:<br>";
$i = 1;
while ($i <= 3) {
    echo "التكرار باستخدام while رقم: $i<br>";
    $i++;
}


echo "استخدام do while:<br>";
$i = 1;
do {
    echo "التكرار باستخدام do while رقم: $i<br>";
    $i++;
} while ($i <= 3);


echo "استخدام switch:<br>";
$day = 2;
switch ($day) {
    case 1:
        echo "الأحد<br>";
        break;
    case 2:
        echo "الاثنين<br>";
        break;
    case 3:
        echo "الثلاثاء<br>";
        break;
    default:
        echo "يوم غير معروف<br>";
}


echo "العمليات الحسابية:<br>";
$x = 8;
$y = 4;
echo "جمع: " . ($x + $y) . "<br>";
echo "طرح: " . ($x - $y) . "<br>";
echo "ضرب: " . ($x * $y) . "<br>";
echo "قسمة: " . ($x / $y) . "<br>";
echo "باقي القسمة: " . ($x % $y) . "<br>";


echo "استخدام معاملات المقارنة:<br>";
if ($x > $y) {
    echo "$x أكبر من $y<br>";
} else {
    echo "$x ليس أكبر من $y<br>";
}
$list = ["tareq", "ali"];
var_dump($list[0]);

?>    

</body>
</html>
