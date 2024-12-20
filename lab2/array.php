<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
</head>
<body>
<?php
// =============================
// قسم المصفوفات (Arrays)
// =============================
echo "<h2>Array Functions</h2>";

// تعريف مصفوفة
$fruits = ["Apple", "Banana", "Cherry"];
echo "Original Array:<br>";
print_r($fruits);
echo "<br><br>";

// 1. count() - حساب عدد العناصر
echo "1. Count:<br>";
echo count($fruits) . "<br><br>";

// 2. array_push() - إضافة عناصر لنهاية المصفوفة
echo "2. array_push:<br>";
array_push($fruits, "Orange", "Grapes");
print_r($fruits);
echo "<br><br>";

// 3. array_pop() - إزالة العنصر الأخير
echo "3. array_pop:<br>";
$lastFruit = array_pop($fruits);
echo "Popped: $lastFruit<br>";
print_r($fruits);
echo "<br><br>";

// 4. array_shift() - إزالة العنصر الأول
echo "4. array_shift:<br>";
$firstFruit = array_shift($fruits);
echo "Shifted: $firstFruit<br>";
print_r($fruits);
echo "<br><br>";

// 5. array_unshift() - إضافة عناصر لبداية المصفوفة
echo "5. array_unshift:<br>";
array_unshift($fruits, "Strawberry", "Peach");
print_r($fruits);
echo "<br><br>";

// 6. in_array() - التحقق من وجود عنصر
echo "6. in_array:<br>";
echo in_array("Banana", $fruits) ? "Found<br>" : "Not Found<br>";
echo "<br>";

// 7. array_reverse() - عكس الترتيب
echo "7. array_reverse:<br>";
$reversed = array_reverse($fruits);
print_r($reversed);
echo "<br><br>";

// 8. sort() - ترتيب تصاعدي
echo "8. sort:<br>";
sort($fruits);
print_r($fruits);
echo "<br><br>";

// 9. rsort() - ترتيب تنازلي
echo "9. rsort:<br>";
rsort($fruits);
print_r($fruits);
echo "<br><br>";

// 10. array_merge() - دمج مصفوفتين
echo "10. array_merge:<br>";
$vegetables = ["Carrot", "Potato"];
$merged = array_merge($fruits, $vegetables);
print_r($merged);
echo "<br><br>";

// 11. array_keys() - الحصول على المفاتيح
echo "11. array_keys:<br>";
$assocArray = ["a" => "Apple", "b" => "Banana", "c" => "Cherry"];
$keys = array_keys($assocArray);
print_r($keys);
echo "<br><br>";

// 12. array_values() - الحصول على القيم
echo "12. array_values:<br>";
$values = array_values($assocArray);
print_r($values);
echo "<br><br>";

// 13. array_unique() - إزالة العناصر المكررة
echo "13. array_unique:<br>";
$duplicatedFruits = ["Apple", "Banana", "Cherry", "Apple"];
$uniqueFruits = array_unique($duplicatedFruits);
print_r($uniqueFruits);
echo "<br><br>";

// 14. array_map() - تطبيق دالة على العناصر
echo "14. array_map:<br>";
$numbers = [1, 2, 3, 4];
$squared = array_map(function($num) {
    return $num * $num;
}, $numbers);
print_r($squared);
echo "<br><br>";

// 15. array_filter() - تصفية العناصر
echo "15. array_filter:<br>";
$even = array_filter($numbers, function($num) {
    return $num % 2 === 0;
});
print_r($even);
echo "<br><br>";

// 16. array_search() - البحث عن عنصر
echo "16. array_search:<br>";
$key = array_search("Banana", $fruits);
echo $key !== false ? "Found at index: $key<br>" : "Not Found<br>";
echo "<br>";

// 17. array_diff() - إيجاد الفرق بين مصفوفتين
echo "17. array_diff:<br>";
$array1 = ["Apple", "Banana", "Cherry"];
$array2 = ["Banana", "Grapes"];
$diff = array_diff($array1, $array2);
print_r($diff);
echo "<br><br>";

// 18. array_intersect() - إيجاد العناصر المشتركة
echo "18. array_intersect:<br>";
$array1 = ["Apple", "Banana", "Cherry"];
$array2 = ["Banana", "Cherry", "Grapes"];
$common = array_intersect($array1, $array2);
print_r($common);
echo "<br><br>";

// =============================
// قسم السلاسل النصية (Strings)
// =============================
echo "<h2>String Functions</h2>";

// تعريف سلسلة نصية
$text = "Hello, PHP World!";
echo "Original Text:<br>";
echo $text . "<br><br>";

// 1. strlen() - حساب طول النص
echo "1. strlen (Length):<br>";
echo strlen($text) . "<br><br>";

// 2. strpos() - إيجاد موضع كلمة أو حرف
echo "2. strpos (Find position of 'PHP'):<br>";
echo strpos($text, "PHP") . "<br><br>";

// 3. str_replace() - استبدال كلمة أو نص
echo "3. str_replace (Replace 'PHP' with 'Web'):<br>";
$newText = str_replace("PHP", "Web", $text);
echo $newText . "<br><br>";

// 4. strtoupper() - تحويل النص إلى حروف كبيرة
echo "4. strtoupper:<br>";
echo strtoupper($text) . "<br><br>";

// 5. strtolower() - تحويل النص إلى حروف صغيرة
echo "5. strtolower:<br>";
echo strtolower($text) . "<br><br>";

// 6. substr() - استخراج جزء من النص
echo "6. substr (Extract 'PHP'):<br>";
echo substr($text, 7, 3) . "<br><br>";

// 7. strrev() - عكس النص
echo "7. strrev (Reverse):<br>";
echo strrev($text) . "<br><br>";

// 8. explode() - تحويل النص إلى مصفوفة بناءً على محدد
echo "8. explode (Split by space):<br>";
$words = explode(" ", $text);
print_r($words);
echo "<br><br>";

// 9. implode() - تحويل المصفوفة إلى نص
echo "9. implode (Join with '-'):<br>";
$joined = implode("-", $words);
echo $joined . "<br><br>";

// 10. trim() - إزالة المسافات الزائدة
echo "10. trim (Remove spaces):<br>";
$textWithSpaces = "   Hello, PHP!   ";
echo "Before trim: '$textWithSpaces'<br>";
echo "After trim: '" . trim($textWithSpaces) . "'<br><br>";

?>
</body>
</html>