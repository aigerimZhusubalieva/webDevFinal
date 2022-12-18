<!DOCTYPE html>
<html lang="en">

<head>
    <title>Peppa Pig Merch</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="cart.css" />
    <link rel="icon" type="image/x-icon" href="img/icon1.png" />
    <script type="text/javascript" src="script.js" defer></script>
    <script type="text/javascript" src="cart.js" defer></script>
</head>

<body>
    <!-- Navbar -->
    <div class="w3-top">
        <div class="w3-bar w3-card">
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right"
                href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i
                    class="fa fa-bars"></i></a>
            <a href="index.html#" class="w3-bar-item w3-button w3-padding-large">HOME</a>
            <a href="index.html#band" class="w3-bar-item w3-button w3-padding-large w3-hide-small">PEPPA</a>
            <a href="index.html#tour" class="w3-bar-item w3-button w3-padding-large w3-hide-small">TOUR</a>
            <a href="index.html#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CONTACT</a>
            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-padding-large w3-button" title="More">
                    MORE <i class="fa fa-caret-down"></i>
                </button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="merch.html" class="w3-bar-item w3-button">Merchandise</a>
                    <a href="media.html" class="w3-bar-item w3-button">Media</a>
                    <a href="newsletter.html" class="w3-bar-item w3-button">Newsletter</a>
                </div>
            </div>
            <a href="javascript:void(0)" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i
                    class="fa fa-search"></i></a>
        </div>
    </div>

    <!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
    <div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top"
        style="margin-top: 46px">
        <a href="index.html#band" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">PEPPA</a>
        <a href="index.html#tour" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">TOUR</a>
        <a href="index.html#contact" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">CONTACT</a>
        <a href="merch.html" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">MERCH</a>
        <a href="media.html" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">MEDIA</a>
        <a href="newsletter.html" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">NEWSLETTER</a>
    </div>

    <!-- Page content -->
    <section id="receipt_cont">
        <article id="receipt">
            <?php
            $name = $_POST['person_name'];
            $email = $_POST['email'];
            $card = $_POST['card_number'];
            $zip = $_POST['zip'];
            $file = fopen("cart.json", "r");
            $totalval = 10;
            ?>
            <div>
                <h2>Receipt</h2>
                <p>Dear, <span id="receipt_name">
                        <?php print($name) ?>
                    </span></p>
                <p>Email: <span id="receipt_email">
                        <?php print($email) ?>
                    </span></p>
                <p>Zip: <span id="receipt_zip">
                        <?php print($zip) ?>
                    </span></p>
                <p>Card number: <span id="receipt_card">
                        <?php print($card) ?>
                    </span></p>
                <ul id="receipt_list">
                    <?php while (!(feof($file))) {
                        $line = fgets($file);
                        $line = rtrim($line);

                        // split string on : to get each field separatly and put values in an array
                    
                        if (empty($line)) {
                            break;
                        }
                        $info = explode(":", $line);
                        $val = floatval($info[4]) * floatval($info[1]);
                        $totalval += $val;
                        print("<li> <div> $info[2] </div> <div><p>x$info[4]</p> <p>$val</p></div> </li>");
                    } ?>
                </ul>
            </div>
            <div>
                <div id="total_con">
                    <span> Shipment cost: </span>
                    <span> $10</span>
                </div>
                <div id="total_con">
                    <span> Total value: </span>
                    <span id="receipt_total_val">
                        <?php print($totalval) ?>
                    </span>
                </div>
            </div>
        </article>
    </section>

    <!-- Image of location/map -->
    <!-- <img src="/w3images/map.jpg" class="w3-image w3-greyscale-min" style="width:100%"> -->

    <!-- Footer -->
    <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
        <p class="w3-medium">
            Powered by
            <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a>
        </p>
    </footer>
</body>

</html>