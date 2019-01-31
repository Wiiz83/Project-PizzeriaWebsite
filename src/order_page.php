		<?php

		//check if order id parameter is in the URL
		if(isset($_GET['order_id']) == 'order_id'){


				$order_id = $_GET['order_id'];
				$check = "SELECT order_id from orders  WHERE order_id ='$order_id'";

				if (!$check) {
				    die('Query failed to execute for some reason');
				}

				else {

					$sql = "SELECT order_id, student, firstname, lastname, email, address, phone, price, size, anchovies, pineapples, pepperoni, peppers, olives, onions, createddatetime, views 
							FROM orders WHERE order_id ='$order_id'";


					$result = mysqli_query($DBConnection, $sql);

					if (mysqli_num_rows($result) > 0) {
					    // output data of each row
					    while($row = mysqli_fetch_assoc($result)) {
					  
					echo "<div id='logo_img'><img src='images/logo.png' alt='logo' id='logo'></div>";

					echo "<div class='summary'>" . 
					"<h2>" . $row["firstname"] . ", welcome to your order page.</h2>".
					"<ul>".
					"<li><i><b>Summary of your order identified by ". $order_id ." :</i></b></li>".
					"</br>".
					"<li>Order Price: ". $row["price"] ."€</li>".
					"<li>Order Date: ". $row["createddatetime"] ."</li>".
					"</br>".
					"<li>Pizza Size: ". $row["size"] ."</li>".
					"<li>Anchoviers: ". $row["anchovies"] ."</li>".
					"<li>Pineapple: ". $row["pineapples"] ."</li>".
					"<li>Pepperoni: ". $row["pepperoni"] ."</li>".
					"<li>Olives: ". $row["olives"] ."</li>".
					"<li>Onion: ". $row["onions"] ."</li>".
					"<li>Peppers: ". $row["peppers"] ."</li>". 
					"</br>".
					"<li>Your Firstname: ". $row["firstname"] ."</li>".
					"<li>Your LastName: ". $row["lastname"] ."</li>".
					"<li>Your Email Address: ". $row["email"] ."</li>".
					"<li>Your Adress: ". $row["address"] ."</li>".
					"<li>Your Phone Number: ". $row["phone"] ."</li>".
					"<li>Are You a Student: ". $row["student"] ."</li>";

					    }

						echo "</br></br>";

						
					echo "<form  id='update-form' name='update' method='update' action='vieworder.php'>";
					echo "	<button type='submit' name='update' value=". $order_id ."> UPDATE </button>";
					echo "</form>";

						echo "</br>";

					echo "<form  id='delete-form' name='delete' method='delete' action='vieworder.php'>";
					echo "	<button type='submit' name='delete' value=". $order_id ."> DELETE </button>";
					echo "</form>";

							 	echo "</br>";
					} 

					else {
					     	echo ' 
						<div id="logo_img"><img src="images/logo.png" alt="logo" id="logo"></div>
						<div class="summary"> 
						<h2 id="heading">Sorry but...</h2>

						<h3>We cannot find this order id :(</h3> <a href=index.php>Return to Home Page</a>
									  </br><br/> ';



					}

				}

					mysqli_close($DBConnection);


			}


			//if there is not a good parameter in the url
			else{
			     	echo ' 
				<div id="logo_img"><img src="images/logo.png" alt="logo" id="logo"></div>
				<div class="summary"> 
				<h2 id="heading">Sorry but...</h2>

				<h3>We cannot find this page :(</h3>
				<a href=index.php>Return to Home Page</a>
									  </br><br/> ';
			}



		?> 