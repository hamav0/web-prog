<?php
$name = "";
$group = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $group = trim($_POST["group"] ?? "");

    if ($name === "" || $group === "") {
        $message = "Заполните оба поля.";
    } else {
        $safeName = htmlspecialchars($name, ENT_QUOTES, "UTF-8");
        $safeGroup = htmlspecialchars($group, ENT_QUOTES, "UTF-8");
        $message = "Здравствуйте, $safeName! Ваша группа: $safeGroup.";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Анкета студента</title>
</head>
<body>
    <h1>Анкета студента</h1>

    <form method="post">
        <p>
            <label>Имя:</label>
            <input type="text" name="name">
        </p>
        <p>
            <label>Группа:</label>
            <input type="text" name="group">
        </p>
        <button type="submit">Отправить</button>
    </form>

    <?php if ($message !== ""): ?>
        <p><?= $message ?></p>
    <?php endif; ?>
</body>
</html>