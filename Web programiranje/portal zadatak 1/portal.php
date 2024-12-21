<?php
    $mysqli = new mysqli("localhost", "root", "", "skolaa");

    if($mysqli -> error)
    {
        echo "Niste se uspesno povezali sa bazom!";
        die($mysqli ->error);
    }

    $indeks = "";
    $ime = "";
    $prezime = "";
    $sifra = "";
    $status = "";

    if(isset($_POST['trazi2']))
    {
       
        $upit = "SELECT * from skola where brIndeksa LIKE '" . $_POST['indeks'] . "'";
        $qry = $mysqli -> query($upit);

        if(!$qry)
        {
            echo "Nije moguce izvristi upit!";
            die($mysqli -> error);
        }

        if((!($qre = $qry -> fetch_assoc())))
        {
            echo  "Student nije pronadjen!";
            die();
        }
        else
        {
            $indeks = $qre['brIndeksa'];
            $ime = $qre['ime'];
            $prezime = $qre['prezime'];
            $sifra = $qre['sifra'];
            $status = $qre['status'];
        }
    }

    
     if(isset($_POST['trazi']))
    {
        $indeks = $_POST['brIndeksa'];
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $sifra = $_POST['sifra'];
        $statuss = $_POST['status'];
        
        $upit = "INSERT INTO skola(brIndeksa, prezime, ime, sifra)";
        $qry = $mysqli -> query($upit);

        if(!$qry)
        {
            echo "Nije moguce izvristi upit!";
            die($mysqli -> error);
        }

        if((!($qre = $qry -> fetch_assoc())))
        {
            echo  "Student nije pronadjen!";
            die();
        }
       
    }

    if(isset($_POST['pretraga']))
    {
        $var = $_POST['nadji'];
        $upit = "SELECT * from skola where $var LIKE '" . $_POST['pretrazi'] . "'";
        $qry = $mysqli -> query($upit);

        if(!$qry)
        {
            echo "Nije moguce izvristi upit!";
            die($mysqli -> error);
        }

        if((!($qre = $qry -> fetch_assoc())))
        {
            echo  "Student nije pronadjen!";
        }
        else
        {
            $indeks = $qre['brIndeksa'];
            $ime = $qre['ime'];
            $prezime = $qre['prezime'];
            $sifra = $qre['sifra'];
            $status = $qre['status'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal</title>
</head>
<body>
<form action="portal.php" method="post">
        <table bgcolor = #ccc>

            <tr>
            <td>Broj Indeksa : </td>
            <td>
                <input type="text" name="indeks" value="<?php echo $indeks ?>">
            </td>
            </tr>

            <tr>
                <td>Ime : </td>
                <td>
                    <input type="text" name="ime" value="<?php echo $ime?>">
                </td>
            </tr>

            <tr>
                <td>Prezime : </td>
                <td>
                    <input type="text" name="prezime" value="<?php echo $prezime?>">
                </td>
            </tr>

            <tr>
                <td>Sifra smera : </td>
                <td>
                    <input type="text" name="sifra" value="<?php echo $sifra?>">
                </td>
            </tr>

            <tr>
                <td>Status : </td>
                <td>
                    <?php
                    if($status == "B")
                    {?>

                        <label> B
                        <input type="radio" name="status" value="B" checked = "checked">
                            S 
                            <input type="radio" name="status" value="S">
                        </label>
                        <?php
                    }
                    else{?>
                        <label> B 
                            <input type="radio" name="status" value="B">
                            S
                            <input type="radio" name="status" value="S" checked="checked">
                        </label>
                    <?php

                    }?>
                </td>
            </tr>

            <tr>
                <td>
                    <select name="nadji">
                        <option value="brIndeksa">Broj indeksa</option>
                        <option value="ime">Ime</option>
                        <option value="prezime">Prezime</option>
                        <option value="sifra">Sifra smera</option>
                        <td>
                            <input type="text" name="pretrazi">
                            <input type="submit" name="pretraga" value="Pretraga">
                        </td>
                    </select>
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input type="submit" name="trazi" value="trazi po prezimenu">
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input type="submit" name="trazi2" value="trazi po indeksu">
                </td>
            </tr>




            
        </table>
    </form>
</body>
</html>