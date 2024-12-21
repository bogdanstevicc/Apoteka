<?php

$fp = fopen("narudzbenica.txt", 'r');

flock($fp, LOCK_SH);


if(!$fp)
{
    echo "Imate neku gresku!";
    exit();
}

while(!feof($fp))
{
    $order = fgets($fp);
    echo $order . "<br>";
}

fclose($fp);

?>