<html>
<head>
    <meta charset="UTF-8">
    <title>BMI per PHP</title>
</head>
<body> <?php
$cm = $_POST['height'];
$kg = $_POST['weight'];
$m = $cm / 100;
$erg = $kg / ($m * $m);
$bmi = round($erg, 2);
echo "Ihr BMI beträgt ";
echo $bmi;
?> </body>
</html>

