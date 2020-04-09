
<?php

global $connection;
	
	
if(isset($_SESSION['total_price_afterConvert'])){
	
	 $order_payment = $_SESSION['total_price_afterConvert']*0.01;
}



 if(isset($_GET['status_id'])){
	 
	 $payment_status_id = $_GET['status_id'];
	 $billcode = $_GET['billcode'];
	 $order_product_id = $_GET['order_product_id '];
	 
	 $query = "INSERT INTO order_product_history (order_product_id, order_billcode, order_status, order_payment, order_date_paymeny) VALUES ('{$order_product_id}', '{$billcode}', '{$payment_status_id}', '{$order_payment}', now()	)";
	 $order_history_query  =   mysqli_query($connection, $query);
     confirmQuery($order_history_query);
	 
	 
	 //to store all the list item 
	 if($payment_status_id === 'Successfull'){
		 
	 }
 }

?>



<h1>THANK YOU FOR PURCHASING</h1>

