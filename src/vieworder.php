<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<title>Your Order</title>
	<link href="main.css" rel="stylesheet" type="text/css">

</head>
<body>

	<?php 

	include 'database_connection.php';	//Include for the database connection


	if (isset($_GET['update'])) { //if update parameter is in the URL
		include 'update_page.php';	//Include to update order
	}
	
	elseif (isset($_GET['delete'])) { //if delete parameter is in the URL
		include 'delete_page.php';	//Include to delete order
	}
	
	elseif ($_SERVER['REQUEST_METHOD'] === 'POST') { //if this is a POST method 
		include 'first_order.php';	//Include with the order details as first post
	}  

	elseif ($_SERVER['REQUEST_METHOD'] === 'GET') { //if this is a GET method
		include 'order_page.php';	//Include with the order page
		}

	else {
		include 'error_page.php';	//File with the error page
	}


?>

	</body>
	</html>


