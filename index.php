<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $all = $_POST['all'] ?? 1;
    $correct = $_POST['correct'] ?? 0;
    $wrong = $_POST['wrong'] ?? 0;

    $correct = $correct * 3;
    $all = $all * 3;

}
function calc($all, $correct, $wrong)
{
    return (($correct - $wrong) / $all) * 100;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
</head>

<body>
    <h1>
        درصد شما:
        <?= calc($all, $correct, $wrong) ?>
    </h1>
    <form action="index.php" method="post">
        <label for="">تعداد کل سوالات</label>
        <input name="all" type="number" required><br />
        <label for="">تعداد پاسخ صحیح</label>
        <input name="correct" type="number" required><br />
        <label for="">تعداد پاسخ غلط</label>
        <input name="wrong" type="number" required><br />
        <button>محاسبه</button>
    </form>
</body>

</html>