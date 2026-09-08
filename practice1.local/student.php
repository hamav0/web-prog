<?php
$fullName = "";
$specialty = "";
$course = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullName = trim($_POST["fullName"] ?? "");
    $specialty = trim($_POST["specialty"] ?? "");
    $course = trim($_POST["course"] ?? "");

    if ($fullName === "" || $specialty === "" || $course === "" ) {
        $message = "Заполните оба поля.";
    } else if ($course < 1 || $course > 4)
    {
        $message = "Укажите курс от 1 до 4";
    } 
    else {
        $safeFullName = htmlspecialchars($fullName, ENT_QUOTES, "UTF-8");
        $safeSpecialty = htmlspecialchars($specialty, ENT_QUOTES, "UTF-8");
        $safeCourse = htmlspecialchars($course, ENT_QUOTES, "UTF-8");
        $message = "Студент: $safeFullName . Специальность: $specialty . Курс: $course.";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Карточка студента</title>
</head>
<body>
    <h1>Карточка студента</h1>

    <form method="post">
        <p>
            <label>Фамилия и имя:</label>
            <input type="text" name="fullName">
        </p>
        <p>
            <label>Специальность:</label>
            <input type="text" name="specialty">
        </p>
        <p>
            <label>Курс:</label>
            <input type="number" name="course">
        </p>
        <button type="submit">Отправить</button>
    </form>

    <?php if ($message !== ""): ?>
        <p><?= $message ?></p>
    <?php endif; ?>
</body>
</html>
