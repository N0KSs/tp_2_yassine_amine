<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vue/css/styles.css">
    <title>Form #1</title>
</head>
<body>
<h1>Welcome, please fill this form : </h1>
<form action="../controleur/index.php" method="post">

<label for="numAddress">Number of address : </label>
<input id="numAddress" name="numAddress" type="number" placeholder="0" value="<?= $values['numAddress'] ?>"/>
<br/>
<p><?=$errMsg?></p>
<input type="submit" name="confirm" value="Confirm" class="inputConfirm" />

</form>
</body>
</html>