<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vue/css/styles.css">
    <title>Form #3 - Info ajout</title>
</head>

<body>
    <h1 style="text-align: center;">Please confirm the following 
        <?=$numAddress ?> addresses :
    </h1>
    <form action="../controleur/infoAddress.php" method="post">


        <?php
        foreach ($lignes as $ligne) {
            echo $ligne;
        }
        ?>

<br\>

        <div style="text-align:center;">
            <input type="submit" name="confirm" value="Confirm" class="inputConfirm" />
            <input type="submit" name="cancel" value="Cancel" class="inputCancel" />
        </div>
        <br\>


    </form>
</body>

</html>


<!-- name= "form[<?php echo $recordID; ?>]" -->