<?php
$data = [
    ['Иванов', 'Математика', 5],
    ['Иванов', 'Математика', 4],
    ['Иванов', 'Математика', 5],
    ['Петров', 'Математика', 5],
    ['Сидоров', 'Физика', 4],
    ['Иванов', 'Физика', 4],
    ['Петров', 'ОБЖ', 4],
];

$students = [];
$subjects = [];

foreach ($data as $entry) {
    list($student, $subject, $score) = $entry;
    if (!isset($students[$student])) {
        $students[$student] = [];
    }
    if (!isset($students[$student][$subject])) {
        $students[$student][$subject] = 0;
    }
    $students[$student][$subject] += $score;
    if (!in_array($subject, $subjects)) {
        $subjects[] = $subject;
    }
}

sort($subjects);

echo "<table border='1'>";
echo "<tr><th>Имя</th>";
foreach ($subjects as $subject) {
    echo "<th>$subject</th>";
}
echo "</tr>";

foreach ($students as $student => $scores) {
    echo "<tr><td>$student</td>";
    foreach ($subjects as $subject) {
        echo "<td>" . ($scores[$subject] ?? '') . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
