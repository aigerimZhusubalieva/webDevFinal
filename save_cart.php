<!DOCTYPE html>
<html lang="en">

<head>
    <title>Peppa Pig Merch</title>

</head>

<body>
    <?php
    $cart = $_POST['cart'];
    $filename = "cart.json";

    $line = "";

    foreach ($_POST as $key => $value) {
        foreach ($value as $h => $b) {
            if ($h == "imageUrl")
                continue;
            $line .= $b . ":";
        }
        $line .= "\n";

    }
    file_put_contents($filename, $line);
    ?>
</body>

</html>