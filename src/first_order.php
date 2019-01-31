	<?php

		// Create or get the order informations
		$orderId = uniqid();
		$result = mysql_query("SELECT `createddatetime` FROM `orders`");
		$date = date_create();
		$finaldate = date_format($date, 'Y-m-d H:i:s');	


		// Create or get the pizza informations
		$pizzaSize = $_POST['pizzaSize'];

		$addAnchovies = isset($_POST['addAnchovies']);
		if( empty($addAnchovies)) { 
		$addAnchovies = "n"; }
		else {
		$addAnchovies = "y";}

		$addPineapple = isset($_POST['addPineapple']);
		if( empty($addPineapple) ) { 
		$addPineapple = "n"; }
		else {
		$addPineapple = "y";}


		$addPepperoni = isset($_POST['addPepperoni']);
		if( empty($addPepperoni) ) { 
		$addPepperoni = "n"; }
		else {
		$addPepperoni = "y";}


		$addOlives = isset($_POST['addOlives']);
		if( empty($addOlives) ) { 
		$addOlives = "n"; }
		else {
		$addOlives = "y";}

		$addOnion = isset($_POST['addOnion']);
		if( empty($addOnion) ) { 
		$addOnion = "n"; }
		else {
		$addOnion = "y";}

		$addPeppers = isset($_POST['addPeppers']);
		if( empty($addPeppers) ) { 
		$addPeppers = "n"; }
		else {
		$addPeppers = "y";}



		$toppings = array($addAnchovies,$addPineapple,$addPepperoni,$addOlives,$addOnion,$addPeppers);

		//function to figure out the final number of toppings
		function ToppingsNumber($toppings){

			$numberOfToppings=0;

			foreach ($toppings as $value) {
				if($value=="y"){
					$numberOfToppings++;
				}
			}
			return $numberOfToppings;
		}


		//function to calculate the final price
		function calculatePrice($pizzaSize, $numberOfToppings){

			$pizzaPrice=0;

			if($pizzaSize=="small"){

				$pizzaPrice=6;
				$pizzaPrice+=$numberOfToppings*0.5;

			}else if($pizzaSize=="medium"){

				$pizzaPrice=10+$numberOfToppings;

			}else if($pizzaSize=="large"){

				$pizzaPrice=12+$numberOfToppings;
			}
			return $pizzaPrice;
		}

		$numberOfToppings=ToppingsNumber($toppings);  //Calculate how many toppings the pizza has
		$pizzaPrice=calculatePrice($pizzaSize,$numberOfToppings);	//Calculate the price of the pizza

		//Get the Customer Informations
		$customerFirstName = $_POST['customerFirstName'];
		$customerLastName = $_POST['customerLastName'];
		$address = $_POST['address'];
		$emailAddress = $_POST['emailAddress'];
		$phoneNo = $_POST['phoneNo'];
		$student = isset($_POST['student']);
			if( empty($student) ) { 
			$student = "n"; }
			else {
			$student = "y";}
		$views = 0;


		//Add elements into the database
		$sql = "INSERT INTO orders (order_id, student, firstname, lastname, email, address, phone, price, size, anchovies, pineapples, pepperoni, peppers, olives, onions, createddatetime, views)
		VALUES ('$orderId', '$student', '$customerFirstName', '$customerLastName', '$emailAddress', '$address', '$phoneNo', '$pizzaPrice', '$pizzaSize', '$addAnchovies', '$addPineapple', '$addPepperoni', '$addPeppers' , '$addOlives', '$addOnion', '$finaldate', '$views')";

			if ($DBConnection->query($sql) === TRUE) {

			} else {
				include 'error_page.php';	//Include if error
			}

			mysqli_close($DBConnection);



			echo "<div id='logo_img'><img src='images/logo.png' alt='logo' id='logo'></div>";


			echo "<div class='summary'>" . 
			"<h2>" . $customerFirstName . " your online order has been confirmed.</h2>".
			"<ul>".
			"<li><i><b>Summary of your order :</i></b></li>".
			"</br>".
			"<li>Order ID: ". $orderId ."</li>".
			"<li>Order Price: ". $pizzaPrice ."€</li>".
			"<li>Order Date: ". $finaldate ."</li>".
			"</br>".
			"<li>Pizza Size: ". $pizzaSize ."</li>".
			"<li>Anchoviers: ". $addAnchovies ."</li>".
			"<li>Pineapple: ". $addPineapple ."</li>".
			"<li>Pepperoni: ". $addPepperoni ."</li>".
			"<li>Olives: ". $addOlives ."</li>".
			"<li>Onion: ". $addOnion ."</li>".
			"<li>Peppers: ". $addPeppers ."</li>".
			"</br>".
			"<li>Your Firstname: ". $customerFirstName ."</li>".
			"<li>Your LastName: ". $customerLastName ."</li>".
			"<li>Your Email Address: ". $emailAddress ."</li>".
			"<li>Your Adress: ". $address ."</li>".
			"<li>Your Phone Number: ". $phoneNo ."</li>".
			"<li>Are You a Student: ". $student ."</li>";


				echo "</br></br>";


				echo "<a href='vieworder.php?".
					"order_id=".
					 $orderId.
					 "'>YOUR ORDER PAGE</a>";

					 	echo "</br></br>";