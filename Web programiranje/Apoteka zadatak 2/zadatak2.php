<?php

$andol = $_POST['andol'];
$aspirin = $_POST['aspirin'];
$vitamin = $_POST['vitamin'];
$adresa = $_POST['adresa'];
$nadji = $_POST['nadji'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Narudzbenica Online</title>
</head>
<body>
        <h1>Apoteka - Narudzbenica</h1>
        <h2>Fiskalni racun</h2>

        <?php
                $datum = date(DATE_RFC2822);
                echo "Roba narucena u : " .$datum . "<br><br>";

                echo "Kupili ste sledece artikle : " . "<br><br>";

                $ukupno = 0;
                $ukupno = $andol + $aspirin + $vitamin;

                if($ukupno == 0)
                {
                    echo "Niste kupili nista!";
                }
                if($andol > 0)
                {
                    echo $andol . " Andola" .  "<br>";
                }
                if($aspirin > 0)
                {
                    echo $aspirin . " Aspirina" .  "<br>";
                }
                if($vitamin > 0)
                {
                    echo $vitamin . " Vitamina" .  "<br><br>";
                }

                $suma = 0;
                define("ANDOLCENA", 250);
                define("ASPIRINCENA", 150);
                define("VITAMINCENA", 200);
                $suma = (ANDOLCENA * $andol) + (ASPIRINCENA * $aspirin) + (VITAMINCENA * $vitamin);
                echo "Racun - suma : " . number_format($suma, 2, ",", ".") .  "<br><br>";

                $porez = 0.09;
                $porez1 = $suma * ($porez + 1);
                echo "Cena sa porezom : " . number_format($porez1, 2, ",", ".") .  "<br><br>";

                echo "Adresa za isporuku : " . $adresa .  "<br><br>";

                if($nadji == "a")
                {
                    echo "Hvala!<br><br>";
                }
                else
                {
                    echo "Dodjite nam ponovo!<br><br>" ;
                }

                $izlaz = $datum . " >>>>>>> \t" . $andol . " Andola, \t" . $aspirin 
                . " Aspirina, \t" . $vitamin . " Vitamina C, \t" 
                . $suma . "\t" . $porez1 . "\t" . $adresa . "\t" .  $nadji . "\n\n";

                $fp = fopen("narudzbenica.txt", 'a');

                flock($fp, LOCK_EX);

                if(!$fp)
                {
                    echo "Nije moguce odraditi vasu narudzbenicu!";
                    exit();
                }

                fwrite($fp, $izlaz);

                flock($fp, LOCK_UN);

                fclose($fp);

                echo "Podaci su uspesno uneti u fajl!";


        ?>
</body>
</html>