<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>INICIO</title>
</head>
<body>
<header>
    <form enctype="multipart/form-data" method="post" action="">
    <input type="submit" value="pdf" name="pdf">
    </form>
    </header>
    <?php
    echo "<td><a href='../model/pdf.php'> <button type='button' class= 'btn btn-outline-success'>Acta PDF</button></a></td>";
    ?>
</body>
</html>