<!DOCTYPE html>
<html lang="en">

<head>
    <title>Peppa Pig Newsletter</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="newsletter.css" />
    <link rel="icon" type="image/x-icon" href="img/icon1.png" />
    <script type="text/javascript" src="script.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" src="newsletter.js" defer></script>
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
    <div id="newsletter" class="w3-content" style="max-width: 2000px; margin-top: 46px">
        <div class="newsletter-banner">
            <div>
                <h2>Newsletter</h2>
                <span>Receive the latest news and updates!</span>
            </div>
        </div>
        <article class="newsletter-body">
            <div>
                <?php
                $email = $_POST["email"];
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $title = $_POST["title"];
                $fp = fopen('emails.txt', 'a');
                $line = $email;
                $line .= "\n";
                fwrite($fp, $line);
                fclose($fp);

                $message = "Thank you for providing your email, $title $fname $lname";
                $headers = 'From: chinakarishev@gmail.com' . "\r\n" .
                    'Reply-To: chinakarishev@gmail.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                mail($email, $fname, $message, $headers);

                print("<p> $message </p>");
                ?>
                <p>Your email was successfully added to our newsletter! </p>
            </div>
        </article>
    </div>

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