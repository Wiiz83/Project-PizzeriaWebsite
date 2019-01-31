<!DOCTYPE html>
<html>
<head>
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<title>Order Your Pizza</title>
	<link href="main.css" rel="stylesheet" type="text/css">

	<script type="text/javascript">

	function redraw()
	{
	//alert ("hello from redraw");
	var pizzaPrice = 0;


	// default to large
	pizzaImageSize = 250;
	pizzaBasePrice = 12;
	pricePerTopping = 1;


	if (document.getElementById('small').checked==true)
	{

		pizzaImageSize = 100;
		pizzaBasePrice = 6;
		pricePerTopping = .5;
	}

	if (document.getElementById('medium').checked==true)
	{
		
		pizzaImageSize = 180;
		pizzaBasePrice = 10;
		pricePerTopping = 1;
	}


	document.getElementById('image1').height=pizzaImageSize;
	document.getElementById('image1').width=pizzaImageSize;
	document.getElementById('image2').height=pizzaImageSize;
	document.getElementById('image2').width=pizzaImageSize;
	document.getElementById('image3').height=pizzaImageSize;
	document.getElementById('image3').width=pizzaImageSize;
	document.getElementById('image4').height=pizzaImageSize;
	document.getElementById('image4').width=pizzaImageSize;
	document.getElementById('image5').height=pizzaImageSize;
	document.getElementById('image5').width=pizzaImageSize;
	document.getElementById('image6').height=pizzaImageSize;
	document.getElementById('image6').width=pizzaImageSize;
	document.getElementById('image7').height=pizzaImageSize;
	document.getElementById('image7').width=pizzaImageSize;

	// do the toppings
	howManyToppings = 0;

	if (document.getElementById('anchovies').checked==true)
	{
		document.getElementById('image2').style.visibility = "visible";
		howManyToppings = howManyToppings + 1;
	}
	else
	{
		document.getElementById('image2').style.visibility = "hidden";
	}



	if (document.getElementById('pineapple').checked==true)
	{
		document.getElementById('image3').style.visibility = "visible";
		howManyToppings = howManyToppings + 1;
	}
	else
	{
		document.getElementById('image3').style.visibility = "hidden";
	}





	if (document.getElementById('pepperoni').checked==true)
	{
		document.getElementById('image4').style.visibility = "visible";
		howManyToppings = howManyToppings + 1;
	}
	else
	{
		document.getElementById('image4').style.visibility = "hidden";
	}






	if (document.getElementById('olives').checked==true)
	{
		document.getElementById('image5').style.visibility = "visible";
		howManyToppings = howManyToppings + 1;
	}
	else
	{
		document.getElementById('image5').style.visibility = "hidden";
	}






	if (document.getElementById('onion').checked==true)
	{
		document.getElementById('image6').style.visibility = "visible";
		howManyToppings = howManyToppings + 1;
	}
	else
	{
		document.getElementById('image6').style.visibility = "hidden";
	}






	if (document.getElementById('peppers').checked==true)
	{
		document.getElementById('image7').style.visibility = "visible";
		howManyToppings = howManyToppings + 1;
	}
	else
	{
		document.getElementById('image7').style.visibility = "hidden";
	}




	// calculate price

	pizzaPrice = pizzaBasePrice + pricePerTopping * howManyToppings;
	document.getElementById('pricetext').innerHTML = pizzaPrice;


}




function validateInput ()
{
	var valid  = new Boolean(true);

	if (document.getElementById("cname").value == "")
	{
		valid = false;
		document.getElementById("cname").style.backgroundColor = "#ff0000";
	}
	else
	{
		document.getElementById("cname").style.backgroundColor = "#99ff99";
	}

	if (document.getElementById("caddress").value == "")
	{
		valid = false;
		document.getElementById("caddress").style.backgroundColor = "#ff0000";
	}
	else
	{
		document.getElementById("caddress").style.backgroundColor = "#99ff99";
	}


	return valid;
}


</script>


</head>
<body>


	<div id='logo_img'><img src='images/logo.png' alt='logo' id='logo'></div>

	<div class='summary'> 

		

		<h2 id="heading">Order Form Page</h2>

		<form  id="pizza-form" onSubmit="return validateInput();" name="theform" method="post" action="vieworder.php">
			<h3>What Size of Pizza Would You Like? </h3>

			Small
			<input id="small" type="radio" name="pizzaSize" value="small" onChange="redraw()"/>
			Medium
			<input id="medium" type="radio" name="pizzaSize" value="medium" onChange="redraw()" />
			Large
			<input id="large" type="radio" name="pizzaSize" value="large" onChange="redraw()" checked/>

			<div id="pizzaImages">
				<p class="image" id="pizzatext" style="font-family:Arial; margin-top:-30px !important; margin-right: 50px !important;  font-weight: : 500; color: red;">Your Pizza Appearance</p>
				<img class="image" id="image1" src="images/base.png" width="250" height="250"/>
				<img class="image" id="image2" src="images/anchois.png" width="250" height="250"/>
				<img class="image" id="image3" src="images/pineapple.png" width="250" height="250"/>
				<img class="image" id="image4" src="images/pepperoni.png" width="250" height="250"/>
				<img class="image" id="image5" src="images/olives.png" width="250" height="250" />
				<img class="image" id="image6" src="images/onion.png" width="250" height="250" />
				<img class="image" id="image7" src="images/pepper.png" width="250" height="250"/>
			</div>
			<br>
			<h3>Add Extra Toppings</h3>

			Anchovies
			<input id="anchovies" type="checkbox" name="addAnchovies" value="yes" onChange="redraw()" checked/>

			Pineapple
			<input id="pineapple" type="checkbox" name="addPineapple" value="yes" onChange="redraw()" checked/>

			Pepperoni
			<input id="pepperoni" type="checkbox" name="addPepperoni" value="yes" onChange="redraw()" checked/>

			Olives
			<input id="olives" type="checkbox" name="addOlives" value="yes" onChange="redraw()" checked/>

			Onion
			<input id="onion" type="checkbox" name="addOnion" value="yes" onChange="redraw()" checked/>

			Peppers
			<input id="peppers" type="checkbox" name="addPeppers" value="yes" onChange="redraw()" checked/>


			<h3>Total Price is: €<span id="pricetext">18</span></h3>

			<h3>Enter your  details</h3>
			First Name:
			<input name="customerFirstName" id="cname" type="text" required />
			<br/>
			<br/>
			Last Name:
			<input name="customerLastName" id="cname" type="text" required />
			<br/>
			<br/>
			Address:
			<textarea name="address" id = "caddress" type="text"rows="5" cols="30" required></textarea>
			<br/>
			<br/>
			Email Address:
			<input name="emailAddress" type="email" required />
			<br/>
			<br/>

			<br/>
			Phone Number:
			<input name="phoneNo" id="phoneNumber" type="text" required/>
			<br/>
			<br/>
			Tick here if you are student:
			<input type="checkbox" id="studentdiscount" name="student" onChange="redraw()"/>

			<input type="hidden" name="post" value="" />

			<br/><br/>
			<button type="submit" value="Place Order">SUBMIT</button>
			
		</form>
<br/>

	</div>








</body>
</html>


