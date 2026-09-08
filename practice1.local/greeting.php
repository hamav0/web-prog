<?php
$product = trim($_POST["product"] ?? "0");
$count = trim($_POST["count"] ?? "0");
$message = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $product = trim($_POST["product"] ?? "");
    $count = trim($_POST["count"] ?? "");
    if ($count >= 1 && $product !== "" && $count <= 100)
        {$message = "Продукт $product в количестве $count.";} 
    else {
        $message = "Заполните поле продукта, а также количество значениями от 1 до 100.";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
$name = $_GET["name"] ?? "";
$safeName = htmlspecialchars($name, ENT_QUOTES, "UTF-8");

if ($name !== "") {
    echo "<p>Здравствуйте, $safeName!</p>";
}
else { echo "<p>Здравствуйте, гость!</p>"; }
?>

    <form method="post">
        <p>
            <label>Название товара:</label>
            <input type="text" name="product">
        </p>
        <p>
            <label>Количество:</label>
            <input type="number" name="count">
        </p>
        <button type="submit">Отправить</button>
    </form>

    <?php if ($message !== ""): ?>
        <p><?= $message ?></p>
    <?php endif; ?>
</body>
</html>