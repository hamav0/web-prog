
<?php
$fullName = "Щербинин Д. С.";
$group = "23-СПО-ИСиП-08";
$course = "4";
$score = "";
$message = "";
$technologies = ["HTML", "CSS", "JavaScript", "PHP", "Blazer", "Dart"];
$price = trim($_POST["price"] ?? "0");
$discountPercent = trim($_POST["discountPercent"] ?? "0");


function calculateDiscount($price, $discountPercent) {
        return $price - ($price * ($discountPercent / 100));
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $score = trim($_POST["score"] ?? "");
    if ($score === "")
        {$message = "Заполните поле.";} 
    else {
        if ($score >= 60 && $score <= 89) {
    $message = "Студент: $fullName . <br>Группа: $group . <br>Курс: $course. <br>Зачет получен";
} else if ($score >= 90 && $score <= 100) {
    $message = "Студент: $fullName . <br>Группа: $group . <br>Курс: $course. <br>Автомат";
} else if ($score >= 101) {
    $message = "Студент: $fullName . <br>Группа: $group . <br>Курс: $course. <br>Необходимо повторить материал";
} else {
    $message = "Значение привышает 100";
}

    }
}
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $price = trim($_GET["price"] ?? "");
    $discountPercent = trim($_GET["discountPercent"] ?? "");

}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Анкета студента</title>
</head>
<body>
    

    <form method="post">
        <p>
            <label>Балл:</label>
            <input type="number" name="score">
        </p>
        <button type="submit">Отправить</button>
    </form>
    <form method="get">
        <p>
            <label>Сумма:</label>
            <input type="number" name="price">
        </p>
        <p>
            <label>Скидка:</label>
            <input type="number" name="discountPercent">
        </p>
        <button type="submit">Отправить</button>
    </form>
    

    <?php if ($message !== ""): ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <?php if ($price !== "" && $discountPercent !== ""): ?>
        <p><?= calculateDiscount($price, $discountPercent) ?></p>
    <?php endif; ?>
    <?php
    foreach($technologies as $technology)
        {
            echo "⁂ $technology<br>";
        }
    ?>
</body>
</html>