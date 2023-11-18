<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vue/css/styles.css">
    <title>Form #2</title>
</head>

<body>
    <h1 style="text-align: center;">Please fill the following
        <?=$numAddress ?> addresses :
    </h1>
    <form action="../controleur/fillAddress.php" method="post">

        <datalist id="typeList">
                <option value="Livraison"></option>
                <option value="Facturation"></option>
                <option value="Autre"></option>
        </datalist>
        <datalist id="cityList">
                <option value="Montréal"></option>
                <option value="Laval"></option>
                <option value="Toronto"></option>
                <option value="Québec"></option>
        </datalist>

        <?php
        foreach ($lignes as $ligne) {
            echo $ligne;
        }
        ?>

<br\>

        <div style="text-align:center;">
            <p><?=$errMsg?></p>
            <input type="submit" name="confirm" value="Confirm" class="inputConfirm" />
            <input type="submit" name="cancel" value="Cancel" class="inputCancel" />
        </div>
        <br\>


    </form>
</body>

</html>


