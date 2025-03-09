<?php
// معلومات الاتصال بقاعدة البيانات
$host = "localhost";
$user = "root"; // اسم المستخدم الافتراضي
$pass = ""; // بدون كلمة مرور إذا لم تقم بتعيينها
$dbname = "test"; // اسم قاعدة البيانات

// الاتصال بقاعدة البيانات
$conn = new mysqli($host, $user, $pass, $dbname);

// التأكد من نجاح الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// استقبال البيانات من الفورم
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// تحضير وإدخال البيانات في الجدول
$sql = "INSERT INTO users (user_name, user_email, user_message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "تم إرسال الرسالة بنجاح!";
} else {
    echo "خطأ: " . $sql . "<br>" . $conn->error;
}

// إغلاق الاتصال
$conn->close();
?>
