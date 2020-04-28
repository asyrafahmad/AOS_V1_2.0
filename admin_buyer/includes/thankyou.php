
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



<?php

//    $status=2;


    $refno=$_POST['refno'];               //payment_invoice
    $status=$_POST['status'];             //payment_status
    $reason=$_POST['reason'];             //payment_reason
    $billcode=$_POST['billcode'];         //payment_billcode
    $order_id=$_POST['order_id'];         //payment_order_id
    $amount=$_POST['amount'];             //payment_price


//    $quporder=sqlquery("update tblorder set status=?, tarikh=now() where id=?");
//    $quporder->bindValue(1, $status);
//    $quporder->bindValue(2, $order_id);
//    $quporder->execute();


    $quporder=sqlquery("UPDATE payment_product_history SET payment_invoice=?, payment_status=?, payment_reason=?, payment_billcode=?, payment_price=?, payment_date=now() WHERE payment_order_id=?");
    $quporder->bindValue(1, $refno);
    $quporder->bindValue(2, $status);
    $quporder->bindValue(3, $reason);
    $quporder->bindValue(4, $billcode);
    $quporder->bindValue(5, $amount);
    $quporder->bindValue(6, $order_id);
    $quporder->execute();

    if($status==1){
        
?>

    <div class="text-center mt-5">
    <h2 class="text-success">Terima kasih kerana membeli.</h2>
    <p class="lead">Pihak kami telah terima pembayaran. Pekerja kami akan proses pesanan anda secepat mungkin.</p>
    <p>Please refer to <a href="<?php echo $home;?>profile/account.html">My Purchase</a> section for order status</p>
    </div>
    
<?php
        
    }
    if($status==2){
    
?>

    <div class="text-center mt-5">
    <h2 class="text-success">Terima kasih kerana membeli.</h2>
    <p class="lead">Status pembayaran anda  <span class="text-warning font-weight-bold">sedang dalam proses.</span><br>Kami akan proses pesanan anda selepas status pembayaran telah berjaya.</p>
    <p>Please refer to <a href="<?php echo $home;?>profile/account.html">My Purchase</a> section for order status</p>
    </div>
    
<?php
        
    }
    if($status==3){
        
?>

    <div class="text-center mt-5">
    <h2 class="text-success">Terima kasih kerana membeli.</h2>
    <p class="lead">Status pembayaran anda <span class="text-danger font-weight-bold">tidak berjaya.</span></p>
    <?php echo "<p>Click <a href='./includes/createBill.php?menu=$menu'>HERE</a> to make a payment</p>" ?>
    </div>
    
<?php    
    
    }

?>