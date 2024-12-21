<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload slike</title>
</head>
<body>
        <form enctype="multipart/form-data" method="post">
            <fieldset>
                <legend>Upload slike</legend>
                    <input type="hidden" name="max_file_size" value="6100">
                    <input type="file" name="fupload">
                    <p>
                    <input type="submit" value="Postavi sliku!">
            </fieldset>
    </form>

    <?php
        
        if(isset($_FILES['fupload']))
        {
            echo "Ime postavljene slike je : " . $_FILES['fupload']['name'] . "<br>";
            echo "Velicina postavljene slike je : " . $_FILES['fupload']['type'] . "<br>";
            echo "Tip postavljene slike je : " . $_FILES['fupload']['size'] . "<br>";

            if($_FILES['fupload']['type'] == "image/jpeg")
            {
                $source = $_FILES['fupload']['tmp_name'];
                $target = 'slike/' . $_FILES['fupload']['name'];
                $slk = "<h2>Postavljena slika je : " . "</h2><img src = \" $target\"";
                echo $slk;
            }
            else
            {
                echo "Imate neku gresku!";
            }
        }




    ?>
</body>
</html>






