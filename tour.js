// global variables
var price = 79;

var total1 = 0;
var total2 = 0;
var total3 = 0;
var total4 = 0;
var total5 = 0;
var total6 = 0;
var total7 = 0;
var total8 = 0;
var total9 = 0;

var grandtotal = 0;

var qt1 = 0;
var qt2 = 0;
var qt3 = 0;
var qt4 = 0;
var qt5 = 0;
var qt6 = 0;
var qt7 = 0;
var qt8 = 0;
var qt9 = 0;

var nyc= document.getElementById("nyc");
nyc.addEventListener("change", nyctotal);

function nyctotal()
{
	qt1 = parseFloat(nyc.value);

	total1 = qt1 * parseFloat(price);

	writeCart();
}


var seattle= document.getElementById("seattle");
seattle.addEventListener("change", seattletotal);

function seattletotal()
{

	qt2 = parseFloat(seattle.value);

	total2 = qt2 * parseFloat(price);

	writeCart();
}

var la= document.getElementById("la");
la.addEventListener("change", latotal);

function latotal()
{

	qt3 = parseFloat(la.value);

	total3 = qt3 * parseFloat(price);

	writeCart();
}


var london= document.getElementById("london");
london.addEventListener("change", londontotal);

function londontotal()
{

	qt4 = parseFloat(london.value);

	total4 = qt4 * parseFloat(price);

	writeCart();
}

var paris= document.getElementById("paris");
paris.addEventListener("change", paristotal);

function paristotal()
{

	qt5 = parseFloat(paris.value);

	total5 = qt5 * parseFloat(price);

	writeCart();
}


var rome= document.getElementById("rome");
rome.addEventListener("change", rometotal);

function rometotal()
{

	qt6 = parseFloat(rome.value);

	total6 = qt6 * parseFloat(price);

	writeCart();
}

var ad= document.getElementById("ad");
ad.addEventListener("change", adtotal);

function adtotal()
{

	qt7 = parseFloat(ad.value);

	total7 = qt7 * parseFloat(price);

	writeCart();
}


var tokyo= document.getElementById("tokyo");
tokyo.addEventListener("change", tokyototal);

function tokyototal()
{

	qt8 = parseFloat(tokyo.value);

	total8 = qt8 * parseFloat(price);

	writeCart();
}

var sydney= document.getElementById("sydney");
sydney.addEventListener("change", sydneytotal);

function sydneytotal()
{

	qt9 = parseFloat(sydney.value);

	total9 = qt9 * parseFloat(price);

	writeCart();
}

function total()
{
	grandtotal = total1 + total2 + total3 + total4 + total5 + total6 + total7 + total8 + total9;
}

function writeCart() {
	let text2 = "";

	if(qt1>0)
	{
		text2 += "<p>New York City Show Tickets: $79 x " + qt1 + "</p>";
		text2 += "<p style='text-align: right;'> Subtotal: $" + total1 + "</p>";
	}
	if(qt2>0)
	{
		text2 += "<p>Seattle Show Tickets: $79 x " + qt2 + "</p>";
		text2 += "<p style='text-align: right;'> Subtotal: $" + total2 + "</p>";
	}
	if(qt3>0)
	{
		text2 += "<p>Los Angeles Show Tickets: $79 x " + qt3 + "</p>";
		text2 += "<p style='text-align: right;'> Subtotal: $" + total3 + "</p>";
	}
	if(qt4>0)
	{
		text2 += "<p>London Show Tickets: $79 x " + qt4 + "</p>";
		text2 += "<p style='text-align: right;'> Subtotal: $" + total4 + "</p>";
	}
	if(qt5>0)
	{
		text2 += "<p>Paris Show Tickets: $79 x " + qt5 + "</p>";
		text2 += "<p style='text-align: right;'> Subtotal: $" + total5 + "</p>";
	}
	if(qt6>0)
	{
		text2 += "<p>Rome Show Tickets: $79 x  " + qt6 + "</p>";
		text2 += "<p style='text-align: right;'> Subtotal: $" + total6 + "</p>";
	}
	if(qt7>0)
	{
		text2 += "<p>Abu Dhabi Show Tickets: $79 x " + qt7 + "</p>";
		text2 += "<p style='text-align: right;'> Subtotal: $" + total7 + "</p>";
	}
	if(qt8>0)
	{
		text2 += "<p>Tokyo Show Tickets: $79 x " + qt8 + "</p>";
		text2 += "<p style='text-align: right;'> Subtotal: $" + total8 + "</p>";
	}
	if(qt9>0)
	{
		text2 += "<p>Sydney Show Tickets: $79 x  " + qt9 + "</p>";
		text2 += "<p style='text-align: right;'> Subtotal: $" + total9 + "</p>";
	}

	total();

	text2 += "<p style='text-align: right;'> Grand Total: $" + grandtotal + "</p>";

	document.getElementById("cartTotal").innerHTML = text2;
}


//getting buyer information for the purchase and receipt

let obj= document.forms[0];

obj.addEventListener("submit", function(e)
{
	 e.preventDefault();

let len = obj.elements.length;

let text =  "<h1> Thank you for your purchase.</h1>";
//random 6 digit number for order number
text +=  "<h1> Receipt for order #" + (Math.floor(Math.random() * 899999) + 100000) + ".</h1><hr style='border-top: dashed black;'>";

let valid = false;

for (let i=0; i < len -2; i++)
{

//if any field is empty
if ((obj.elements[i].value == "") || (obj.elements[i].value == null))
{

	alert("Make sure to input " + obj.elements[i].name);

	obj.elements[i].focus();

	obj.elements[i].select();

	obj.elements[i].style.backgroundColor="aqua";

	valid=false;

	return;
}

//if zip code isnt 5 digits
else if ((i == 3 ) && (obj.elements[i].value.length != 5)  )
{

	alert("Make sure to input the 5 digits for zip code");
	obj.elements[i].focus();
	obj.elements[i].select();
	obj.elements[i].style.backgroundColor="aqua";
	valid=false;
	return;
}

//validate email
else if ((i == 4 ) && (obj.elements[i].value.indexOf("@") == -1))
{

	alert("Your email should include the '@' for this email" + obj.elements[i].name);
	obj.elements[i].focus();
	obj.elements[i].select();
	obj.elements[i].style.backgroundColor="aqua";
	valid=false;
	return;
}

else if ((i == 4 ) &&  (obj.elements[i].value.indexOf(".") == -1))
{

	alert("Your email should include the '.' for this " + obj.elements[i].name);
	obj.elements[i].focus();
	obj.elements[i].select();
	obj.elements[i].style.backgroundColor="aqua";
	valid=false;
	return;
}

//validate that phone number has all numbers
else if ((i == 5) && !(/^[0-9]+$/.test(obj.elements[i].value)))
{
	alert("Input a valid phone number.");
	obj.elements[i].focus();
	obj.elements[i].select();
	obj.elements[i].style.backgroundColor="aqua";
	valid=false;
	return;
}

//phone number length
else if ((i == 5) && (obj.elements[i].value.length < 6))
{
	alert("Phone number must be at least 6 characters.");
	obj.elements[i].focus();
	obj.elements[i].select();
	obj.elements[i].style.backgroundColor="aqua";
	valid=false;
	return;
}

//validate card number
else if ((i == 6) && !(/^[0-9]+$/.test(obj.elements[i].value)))
{
	alert("Input a valid card number.");
	obj.elements[i].focus();
	obj.elements[i].select();
	obj.elements[i].style.backgroundColor="aqua";
	valid=false;
	return;
}

//card num length
else if ((i == 6) && (obj.elements[i].value.length != 16))
{
	alert("Card number must be 16 characters long.");
	obj.elements[i].focus();
	obj.elements[i].select();
	obj.elements[i].style.backgroundColor="aqua";
	valid=false;
	return;
}

//if all is in order update boolean
else 
{
	valid=true;
}

}

if(valid)
{
	//receipt functiom

	text += "<p>Name: " + obj.elements[0].value + " " + obj.elements[1].value + "</p>";

	text += "<p>Address: " + obj.elements[2].value + "</p>";

	text += "<p>Zip code: " + obj.elements[3].value + "</p>";

	text += "<p>Email: " + obj.elements[4].value + "</p>";

	text += "<p>Phone: " + obj.elements[5].value + "</p>";

	let card = obj.elements[6].value;
	let censored = "XXXXXXXXXXXX" + card.slice(12, 16);

	text += "<p>Card Number: " + censored + "</p> <hr style='border-top: dashed black;'>";
	
	//print if there is any non-zero quantity of a product
	if(qt1>0)
	{
		text += "<p>New York City Show Tickets: $79 x " + qt1 + "</p>";
		text += "<p style='text-align: right;'> Subtotal: $" + total1 + "</p>";
	}
	if(qt2>0)
	{
		text += "<p>Seattle Show Tickets: $79 x " + qt2 + "</p>";
		text += "<p style='text-align: right;'> Subtotal: $" + total2 + "</p>";
	}
	if(qt3>0)
	{
		text += "<p>Los Angeles Show Tickets: $79 x " + qt3 + "</p>";
		text += "<p style='text-align: right;'> Subtotal: $" + total3 + "</p>";
	}
	if(qt4>0)
	{
		text += "<p>London Show Tickets: $79 x " + qt4 + "</p>";
		text += "<p style='text-align: right;'> Subtotal: $" + total4 + "</p>";
	}
	if(qt5>0)
	{
		text += "<p>Paris Show Tickets: $79 x " + qt5 + "</p>";
		text += "<p style='text-align: right;'> Subtotal: $" + total5 + "</p>";
	}
	if(qt6>0)
	{
		text += "<p>Rome Show Tickets: $79 x  " + qt6 + "</p>";
		text += "<p style='text-align: right;'> Subtotal: $" + total6 + "</p>";
	}
	if(qt7>0)
	{
		text += "<p>Abu Dhabi Show Tickets: $79 x " + qt7 + "</p>";
		text += "<p style='text-align: right;'> Subtotal: $" + total7 + "</p>";
	}
	if(qt8>0)
	{
		text += "<p>Tokyo Show Tickets: $79 x " + qt8 + "</p>";
		text += "<p style='text-align: right;'> Subtotal: $" + total8 + "</p>";
	}
	if(qt9>0)
	{
		text += "<p>Sydney Show Tickets: $79 x  " + qt9 + "</p>";
		text += "<p style='text-align: right;'> Subtotal: $" + total9 + "</p>";
	}

	text += "<hr style='border-top: dashed black;'>";

	total();

	text += "<p style='text-align: right;'>Grand Total: $" + grandtotal + "</p>";

}

// display the output inside the div element

document.getElementById("demo").innerHTML= text;
document.getElementById("demo").style.backgroundImage = "url('img/paper.jpeg')";

} ) ;