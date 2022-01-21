<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<section>
    <h1>Rodné číslo</h1>
<?php
//přes $_GET jen pro zkoušku, rc nepředávat v URL 
$rc = $_GET['rc'];
if($rc){
    $year = mb_substr($rc,0,2);
    $month = mb_substr($rc,2,2);
    $day = mb_substr($rc,4,2);
    $verifi = mb_substr($rc,6);

//ověření jestli žena/muž
    if ($month > 70) {
        $month -= 70;
        echo "žena ";
    } 
    elseif ($month > 50) {
        $month -= 50;
        echo "žena ";
    }
    elseif ($month > 20) {
        $month -= 20;
        echo "muž ";
    }
    else {
        echo "muž ";
    }
    //ověřit jestli 19 nebo 20 a dělitelné beze zbytku 11 od roku 1954
    if ((($year <= 54) && (mb_strlen($rc) == 9)) || (($year > 54) && (mb_strlen($rc) == 10) && ($rc % 11 == 0))) {
        $year = "19" . $year;
        echo $day . "." . $month . "." . $year;
    } //dodělat ještě datum větší než aktuální aby neprošlo! 
    elseif (($year <= Date("Y")) && (mb_strlen($rc) == 10) && ($rc % 11 == 0)) {
        $year = "20" . $year;
        echo $day . "." . $month . "." . $year;
    }
    else {
        echo "chyba.";
    }
    //$datum = Date("j.m.Y");
    $age = Date("Y") - $year;
    //před narozeninami musíme odečíst rok
    if (($month > Date("m")) || (($month == Date("m")) && ($day > Date("j")))) {
        $age--;
    }
    
    echo " Věk je : " . $age;
}
?>
</section>
</body>
</html>