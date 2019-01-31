		<?php


		//Check if delete variable is in the URL
		if(isset($_GET['delete']) == 'delete'){

					//create a variable with the order id
					$order_id = $_GET['delete'];

					//prepare a query which will select all the informations linked with this order id
					$query = mysqli_query($DBConnection, "SELECT order_id FROM orders  WHERE order_id ='$order_id'");

					// if order id exist, it will enter in this condition
					if(mysqli_num_rows($query) > 0){

							//prepare a query which will delete wll the informations linked with the order id
					    	$delete_query = "DELETE FROM orders WHERE order_id ='$order_id'"; 

					    	//execute the query 
						    $db_select = mysqli_query($DBConnection, $delete_query) or die (mysqli_error($DBConnection));

						    echo ' 
							<div id="logo_img"><img src="images/logo.png" alt="logo" id="logo"></div>
							<div class="summary"> 
									 <h2 id="heading">Order Successfully Deleted.</h2>
									 <a href=index.php>Return to Home Page</a>
									  </br><br/>
							 </div>';
					}




					// if the order id doesn't exist 
					else{

									     echo ' 
						<div id="logo_img"><img src="images/logo.png" alt="logo" id="logo"></div>
						<div class="summary"> 
						<h2 id="heading">Sorry but...</h2>

						<h3>We cannot find this order id :(</h3>
						<a href=index.php>Return to Home Page</a>
									  </br><br/> ';

					}

					//Close connection
					mysqli_close($DBConnection);
							 }


			// if delete variable is not in the URL
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