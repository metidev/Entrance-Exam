<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $all = $_POST['all'] ?? 0;
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
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
        html {
            font-family: 'vazirmatn', Tahoma;
            width: 100%;
        }

        body {
            margin: 5% auto 0 auto;
            width: 90%;
            max-width: 1125px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 2.5%;
        }

        input,
        span,
        label,
         {
            font-family: 'Ubuntu', Tahoma;
            display: block;
            margin: 10px;
            padding: 5px;
            border: none;
            font-size: 22px;
        }
        input::placeholder{
            font-family: 'vazirmatn',Tahoma;
        }

        textarea:focus,
        input:focus {
            outline: 0;
        }

        /* Question */

        input.question,
        textarea.question {
            font-size: 48px;
            font-weight: 300;
            border-radius: 2px;
            margin: 0;
            border: none;
            width: 80%;
            background: rgba(0, 0, 0, 0);
            transition: padding-top 0.2s ease, margin-top 0.2s ease;
            overflow-x: hidden;
            /* Hack to make "rows" attribute apply in Firefox. */
        }

        /* Underline and Placeholder */

        input.question+label,
        textarea.question+label {
            display: block;
            position: relative;
            white-space: nowrap;
            padding: 0;
            margin: 0;
            width: 10%;
            border-top: 1px solid red;
            -webkit-transition: width 0.4s ease;
            transition: width 0.4s ease;
            height: 0px;
        }

        input.question:focus+label,
        textarea.question:focus+label {
            width: 80%;
        }

        input.question:focus,
        input.question:valid {
            padding-top: 35px;
        }

        textarea.question:valid,
        textarea.question:focus {
            margin-top: 35px;
        }

        input.question:focus+label>span,
        input.question:valid+label>span {
            top: -100px;
            font-size: 22px;
            color: #333;
        }

        textarea.question:focus+label>span,
        textarea.question:valid+label>span {
            top: -150px;
            font-size: 22px;
            color: #333;
        }

        input.question:valid+label,
        textarea.question:valid+label {
            border-color: green;
        }

        input.question:invalid,
        textarea.question:invalid {
            box-shadow: none;
        }

        input.question+label>span,
        textarea.question+label>span {
            font-weight: 300;
            margin: 0;
            position: absolute;
            color: #8F8F8F;
            font-size: 48px;
            top: -66px;
            left: 0px;
            z-index: -1;
            -webkit-transition: top 0.2s ease, font-size 0.2s ease, color 0.2s ease;
            transition: top 0.2s ease, font-size 0.2s ease, color 0.2s ease;
        }

        input[type="submit"] {
            -webkit-transition: opacity 0.2s ease, background 0.2s ease;
            transition: opacity 0.2s ease, background 0.2s ease;
            display: block;
            opacity: 0;
            margin: 10px 0 0 0;
            padding: 10px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #EEE;
        }

        input[type="submit"]:active {
            background: #999;
        }

        input.question:valid~input[type="submit"],
        textarea.question:valid~input[type="submit"] {
            -webkit-animation: appear 1s forwards;
            animation: appear 1s forwards;
        }

        input.question:invalid~input[type="submit"],
        textarea.question:invalid~input[type="submit"] {
            display: none;
        }

        @-webkit-keyframes appear {
            100% {
                opacity: 1;
            }
        }

        @keyframes appear {
            100% {
                opacity: 1;
            }
        }
    </style>
</head>

<body>

    <form action="index.php" method="post">
        <h1>
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST')
                echo "درصد شما:" .calc($all, $correct, $wrong);
            
            else
                echo "محاسبه درصد یا نمره خام";
            ?>

        </h1>
        <input type="text" name="correct" class="question" id="nme" required autocomplete="off" />
        <label for="nme"><span>به چند سوال پاسخ صحیح دادید؟</span></label>
        <input type="text" name="wrong" class="question" id="nme" required autocomplete="off" />
        <label for="msg"><span>به چند سوال پاسخ اشتباه دادید؟</span></label>
        <input type="text" name="all" class="question" id="nme" required autocomplete="off" />
        <label for="msg"><span>تعداد کل سوالات را وارد کنید</span></label>
        <input type="submit" value="محاسبه!" />
    </form>
</body>

</html>