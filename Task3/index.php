<?php
$mysqli = new mysqli("localhost", "root", "", "comments_db");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = $mysqli->real_escape_string($_POST['content']);
    $stmt = $mysqli->prepare("INSERT INTO comments (content) VALUES (?)");
    $stmt->bind_param("s", $content);
    $stmt->execute();
    $stmt->close();
}

$result = $mysqli->query("SELECT * FROM comments ORDER BY id DESC");

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Комментарии</title>
</head>
<body>
    <h1>Комментарии</h1>
    <form method="post" action="">
        <textarea name="content" required></textarea><br>
        <input type="submit" value="Добавить комментарий">
    </form>
    <h2>Список комментариев</h2>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li><?= htmlspecialchars($row['content']) ?></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
