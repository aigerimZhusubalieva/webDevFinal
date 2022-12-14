<!DOCTYPE html>
<html lang="en">
<head>
<title>Peppa Pig Official</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="login.css">
<link rel="icon" type="image/x-icon" href="img/icon1.png">
<script type="text/javascript" src="script.js" defer></script>
</head>


<body>

    <div id="loginDiv">
        <h1> Welcome to Peppa Pig Official</h1>
        <h3>A few things before we get started...</h3>

        <form action="index.php" method="post">
            Enter your name<input class="w3-input w3-border" type=text name='fname'> <br>
            Enter your email<input class="w3-input w3-border" type=text name='email'><br>
            <p id="row">
                <input type=submit name='register' class="w3-button w3-black w3-section" value="Register">
                <input type=submit name='login' class="w3-button w3-black w3-section" value="Login">
                <!-- capitalized login and register, might cause errors -->
            <p>
        </form>
    </div>
    <div>
        <img src="img/sun.png" id="sun" alt="sun image">
        <div class="layer slow slow-animation cloud">
            <img src="img/cloudSlow.png" height="device-height">
        </div>
        <div class="layer medium medium-animation cloud">
            <img src="img/cloudMedium.png" height="device-height">
        </div>
        <div class="layer fast fast-animation cloud">
            <img src="img/cloudFast.png" height="device-height">
        </div>
    </div>

<?php
    $fname = $_POST['fname'];
    $email = $_POST['email'];

    $filename = "users.txt";

    function login(){
        $loginflag = FALSE;
        global $fname, $email, $filename;


        $file1 = fopen($filename, 'r')  or die("<script>alert('Errors reading from the file');</script>");

        while (!(feof($file1))){
            $line = fgets($file1);
            $line = trim($line);
            $info = explode(":", $line);

            if (($info[0] == $fname) && ($info[1] == $email)){
                $loginflag = TRUE;
                break;
            }
        }
        if ($loginflag){
            header('Location:https://i6.cims.nyu.edu/~az2177/finalProject/index.html');
        }else{
            echo "<script>alert('Please enter a valid user name and email!');</script>";
        }
        fclose($file1);
    }

    function store(){
        global $fname, $email, $filename;
        $file1 = fopen($filename, 'a') or die("<script>alert('Errors opening the file');</script>");
        
        $line = $fname . ":" . $email . "\n";
        
        fwrite($file1, $line);
        
        fclose($file1);
        
        header('Location:https://i6.cims.nyu.edu/~az2177/finalProject/index.html');
    }

    if (isset($_POST['register'])){
        if($fname == '' or $email == ''){
            echo "<script>alert('Please enter a valid user name and email!');</script>";
        }
        store();
    }elseif (isset($_POST['login'])){
        if($fname == '' or $email == ''){
            echo "<script>alert('Please enter a valid user name and email!');</script>";
        }
        login();
    }          
?>

</body>
</HTML>