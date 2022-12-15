<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Peppa Pig Merch</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="cart.css" />
    <link rel="icon" type="image/x-icon" href="img/icon1.png" />
    <script type="text/javascript" src="script.js" defer></script>
    <script type="text/javascript" src="cart.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <script>
      $(document).ready(function(){
          $("#search").hide();
          $("#product1").hide();
          $("#product2").hide();
          $("#product3").hide();
          $("#product4").hide();
          $("#product5").hide();
          $("#product6").hide();
          var idArr = [];
          console.log("hello;")
          $(".results").each(function(){
            idArr.push($(this).attr("id"));
            console.log($(this).attr("id"));
          });

          for(var i=0; i<idArr.length; i++){
            var temp = "#" + idArr[i];
            console.log(temp);
            console.log(i);

            
            //$(temp).show();
          }

      });

      function inputShow() {
        $("#searchBtn").hide();
        $("#search").fadeIn();

      }
      </script>
  </head>
  <body>
    <!-- Navbar -->
    <div class="w3-top">
      <div class="w3-bar w3-card">
        <a
          class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right"
          href="javascript:void(0)"
          onclick="myFunction()"
          title="Toggle Navigation Menu"
          ><i class="fa fa-bars"></i
        ></a>
        <a href="index.html#" class="w3-bar-item w3-button w3-padding-large"
          >HOME</a
        >
        <a
          href="index.html#band"
          class="w3-bar-item w3-button w3-padding-large w3-hide-small"
          >PEPPA</a
        >
        <a
          href="tour.html"
          class="w3-bar-item w3-button w3-padding-large w3-hide-small"
          >TOUR</a
        >
        <a
          href="index.html#contact"
          class="w3-bar-item w3-button w3-padding-large w3-hide-small"
          >CONTACT</a
        >
        <div class="w3-dropdown-hover w3-hide-small">
          <button class="w3-padding-large w3-button" title="More">
            MORE <i class="fa fa-caret-down"></i>
          </button>
          <div class="w3-dropdown-content w3-bar-block w3-card-4">
            <a href="merch.html" class="w3-bar-item w3-button">Merchandise</a>
            <a href="media.html" class="w3-bar-item w3-button">Media</a>
            <a href="newsletter.html" class="w3-bar-item w3-button"
              >Newsletter</a
            >
          </div>
        </div>
        <form action="search.php" method="post">
          <input
            class="w3-right"
            type="text"
            id="search"
            name="productName"
            style="width: 160px; margin-right: 1%"
          />
        </form>
        <a
          onclick="inputShow()"
          id="searchBtn"
          href="javascript:void(0)"
          class="w3-padding-large w3-hover-purple w3-hide-small w3-right"
          ><i class="fa fa-search"></i
        ></a>
      </div>
    </div>

    <!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
    <div
      id="navDemo"
      class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top"
      style="margin-top: 46px"
    >
      <a
        href="#band"
        class="w3-bar-item w3-button w3-padding-large"
        onclick="myFunction()"
        >PEPPA</a
      >
      <a
        href="tour.html"
        class="w3-bar-item w3-button w3-padding-large"
        onclick="myFunction()"
        >TOUR</a
      >
      <a
        href="#contact"
        class="w3-bar-item w3-button w3-padding-large"
        onclick="myFunction()"
        >CONTACT</a
      >
      <a
        href="merch.html"
        class="w3-bar-item w3-button w3-padding-large"
        onclick="myFunction()"
        >MERCH</a
      >
      <a
        href="media.html"
        class="w3-bar-item w3-button w3-padding-large"
        onclick="myFunction()"
        >MEDIA</a
      >
      <a
        href="newsletter.html"
        class="w3-bar-item w3-button w3-padding-large"
        onclick="myFunction()"
        >NEWSLETTER</a
      >
    </div>

<?php 
function isSubstring($str1, $str2) {
$s1 = strtolower($str1);
$s2 = strtolower($str2);
$M = strlen($s1); 
$N = strlen($s2); 

for ($i = 0; $i <= $N - $M; $i++) { 
$j = 0; 

for (; $j < $M; $j++) 
if ($s2[$i + $j] != $s1[$j]) 
break; 
if ($j == $M) 
return $i; 
} 
return -1; 
} 

$productName = $_POST['productName'];

$file = fopen("product.txt", "r");

$results = array();

while(!(feof($file)))
{

$index = 0;

$line= fgets($file);

$line = rtrim($line);

$info = explode(":", $line);

if (isSubstring($productName,$info[0])!= -1)
{
	array_push($results, $info[1]);
	$index++;
}

}


if (count($results)>0)
	{
	
	for($i=0;$i<count($results);$i++)
		{ 
print("<p class='results' id='product$results[$i]'>"); 
		}
	
	}
else
{
	print("Sorry- We don't have the Product that you are searching for!");
}

?>
<!-- Page content -->
    <aside id="cart">
      <div>
        <h2>Cart</h2>
        <div class="close" onclick="openCart()"></div>
        <ul id="cart_list"></ul>
      </div>
      <div>
        <div id="total_con">
          <span> Shipment cost: </span>
          <span> $10</span>
        </div>
        <div id="total_con">
          <span> Total value: </span>
          <span id="total_val"></span>
        </div>
      </div>
      <button id="checkout" onclick="openCheckout()">Checkout</button>
    </aside>
    <section id="merch">
      <div class="heading">
        <h2>Products</h2>
        <button onclick="openCart()">Cart</button>
      </div>
      <ul id="products"></ul>
    </section>
    <article id="get_checkout">
      <h2>Checkout</h2>
      <div class="close" onclick="openCheckout()"></div>
      <form method="post" action="receipt.php">
        <label>Name</label>
        <input
          minlength="1"
          id="name"
          required
          type="text"
          name="person_name"
        />
        <label>Email</label>
        <input
          pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
          required
          type="email"
          name="email"
          id="email"
        />
        <label>Zip</label>
        <input required pattern="[\d ]{5}" id="zip" type="text" name="zip" />
        <label>Card number</label>
        <input
          pattern="[\d ]{16}"
          id="card"
          type="text"
          name="card_number"
          required
        />
        <input type="submit" name="submit" value="submit" />
      </form>
    </article>

    <!-- Image of location/map -->
    <!-- <img src="/w3images/map.jpg" class="w3-image w3-greyscale-min" style="width:100%"> -->

    <!-- Footer -->
    <footer
      class="w3-container w3-center w3-xlarge w3-padding-64"
      style="background-color: #1a9ac8"
    >
      <a
        href="https://www.facebook.com/OfficialPeppaPig"
        class="fa fa-facebook-official w3-hover-opacity"
        style="text-decoration: none"
      ></a>
      <a
        href="https://www.instagram.com/officialpeppa/"
        class="fa fa-instagram w3-hover-opacity"
        style="text-decoration: none"
      ></a>
      <a
        href="https://twitter.com/peppapig"
        class="fa fa-twitter w3-hover-opacity"
        style="text-decoration: none"
      ></a
      ><br />
    </footer>
  </body>
</html>

