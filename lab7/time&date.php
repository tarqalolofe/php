<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time&Date</title>
</head>
<body>
    <?php
// 1. ضبط المنطقة الزمنية
date_default_timezone_set("Asia/Riyadh");
echo "1. ضبط المنطقة الزمنية إلى Riyadh<br><br>";

// 2. دالة date()
// تستقبل صيغة تنسيق التاريخ (مثل 'Y-m-d') وتعرض التاريخ الحالي
echo "2. التاريخ الحالي: " . date("Y-m-d H:i:s") . "<br>";
echo "اليوم: " . date("l") . "<br>";
echo "الشهر: " . date("F") . "<br><br>";

// 3. دالة time()
// لا تستقبل مدخلات، تعطي الطابع الزمني (timestamp) الحالي
echo "3. الطابع الزمني الحالي: " . time() . "<br><br>";

// 4. دالة strtotime()
// تستقبل سلسلة نصية (مثل 'next Friday') وتحولها إلى طابع زمني
$next_friday = strtotime("next Friday");
echo "4. طابع زمني ليوم الجمعة القادم: " . $next_friday . "<br>";
echo "تاريخ الجمعة القادم: " . date("Y-m-d", $next_friday) . "<br><br>";

// 5. دالة mktime()
// تستقبل (ساعة، دقيقة، ثانية، شهر، يوم، سنة) وتعيد طابعًا زمنيًا
$custom_timestamp = mktime(14, 30, 0, 1, 15, 2025);
echo "5. طابع زمني مخصص (15 يناير 2025 الساعة 14:30): " . $custom_timestamp . "<br>";
echo "تاريخه: " . date("Y-m-d H:i:s", $custom_timestamp) . "<br><br>";

// 6. دالة checkdate()
// تستقبل (شهر، يوم، سنة) وتتحقق من صحة التاريخ
echo "6. التحقق من تاريخ 29 فبراير 2023: " . (checkdate(2, 29, 2023) ? "صحيح" : "غير صحيح") . "<br><br>";

// 7. دالة getdate()
// تستقبل طابعًا زمنيًا اختياريًا وتعطي تفاصيل التاريخ
$date_info = getdate();
echo "7. معلومات التاريخ الحالي:<br>";
print_r($date_info);
echo "<br><br>";

// 8. دالة date_create() و date_format()
// لإنشاء كائن تاريخ وتنسيقه
$date = date_create("2025-01-15");
echo "8. كائن التاريخ: " . date_format($date, "Y/m/d H:i:s") . "<br><br>";

// 9. دالة date_add() و date_sub()
// لإضافة أو طرح فترات زمنية
date_add($date, date_interval_create_from_date_string("10 days"));
echo "9. إضافة 10 أيام: " . date_format($date, "Y-m-d") . "<br>";
date_sub($date, date_interval_create_from_date_string("15 days"));
echo "طرح 15 يومًا: " . date_format($date, "Y-m-d") . "<br><br>";

// 10. دالة date_diff()
// لحساب الفرق بين تاريخين
$date1 = new DateTime("2025-01-15");
$date2 = new DateTime("2025-02-20");
$diff = $date1->diff($date2);
echo "10. الفرق بين 15 يناير و20 فبراير: " . $diff->format("%a يوم") . "<br><br>";

// 11. دالة strftime()
// تستقبل صيغة محلية لعرض التاريخ بناءً على إعدادات اللغة
setlocale(LC_TIME, "ar_SA.UTF-8");
echo "11. اليوم باللغة العربية: " . strftime("%A %d %B %Y") . "<br><br>";

// 12. دالة microtime()
// تعرض الوقت الحالي مع الدقة بالميكروثانية
echo "12. الوقت بالدقة العالية: " . microtime() . "<br><br>";

// 13. دوال المنطقة الزمنية (timezone_identifiers_list)
// لا تستقبل مدخلات، تعرض قائمة بالمناطق الزمنية المتاحة
$timezones = timezone_identifiers_list();
echo "13. أول 5 مناطق زمنية:<br>";
foreach (array_slice($timezones, 0, 5) as $timezone) {
    echo $timezone . "<br>";
}
?>
</body>
</html>