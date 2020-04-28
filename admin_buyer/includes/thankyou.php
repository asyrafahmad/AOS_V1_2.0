
<?php

//------------DB CONNECTION----------------

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "agro_db";

foreach($db as $key => $value){
define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);

//------------ DB CONNECTION ----------------

//------------ GET ID ----------------

$id_query  =  "SELECT * FROM payment_product_history ";    
$get_order_id_query = mysqli_query($connection, $id_query);

while ($row = mysqli_fetch_assoc($get_order_id_query)){

    $order_id = $row['payment_id'];
}

echo $order_id;

//------------ GET ID ----------------


	


?>



<?php

    $status=1;


//    $refno=$_POST['refno'];               //payment_invoice
//    $status=$_POST['status'];             //payment_status (1= success, 2=pending, 3=fail)
//    $reason=$_POST['reason'];             //payment_reason
//    $billcode=$_POST['billcode'];         //payment_billcode
//    $order_id=$_POST['order_id'];         //payment_order_id (Your external payment reference no, if specified)
//    $amount=$_POST['amount'];             //payment_price


////ORIGINAL
//    $quporder=sqlquery("update tblorder set status=?, tarikh=now() where id=?");
//    $quporder->bindValue(1, $status);
//    $quporder->bindValue(2, $order_id);
//    $quporder->execute();
////ORIGINAL



//    $quporder=sqlquery("UPDATE payment_product_history SET payment_invoice=?, payment_status=?, payment_reason=?, payment_billcode=?, payment_price=?, payment_date=now() WHERE payment_order_id=?");
//    $quporder->bindValue(1, $refno);
//    $quporder->bindValue(2, $status);
//    $quporder->bindValue(3, $reason);
//    $quporder->bindValue(4, $billcode);
//    $quporder->bindValue(5, $amount);
//    $quporder->bindValue(6, $order_id);
//    $quporder->execute();




    if($status==1){
        
        
//    $quporder="UPDATE payment_product_history SET  payment_status=? WHERE payment_order_id=?";
//    $quporder->bindValue(1, "Berjaya");
//    $quporder->bindValue(2, "#102030");
//    $quporder->execute();
        
        $query = "UPDATE payment_product_history SET                    ";
        $query .= "payment_status        = 'Berjaya',            ";
        $query .= "payment_date        = now()            ";
        $query .= "WHERE payment_id     =  '{$order_id}'          ";

        $edit_buyer_query = mysqli_query($connection,$query);
        
?>

    <div class="text-center mt-5">
    <h2 class="text-success">Terima kasih kerana membeli.</h2>
    <p class="lead">Pihak kami telah terima pembayaran. Pekerja kami akan proses pesanan anda secepat mungkin.</p>
    <p>Please refer to <a href="<?php echo $home;?>profile/account.html">My Purchase</a> section for order status</p>
    </div>
    
<?php
        
    }
    if($status==2){
        
    $quporder=sqlquery("UPDATE payment_product_history SET payment_invoice=?, payment_status=?, payment_reason=?, payment_billcode=?, payment_price=?, payment_date=now() WHERE payment_order_id=?");
    $quporder->bindValue(1, $refno);
    $quporder->bindValue(2, "Menunggu");
    $quporder->bindValue(3, $reason);
    $quporder->bindValue(4, $billcode);
    $quporder->bindValue(5, $amount);
    $quporder->bindValue(6, $order_id);
    $quporder->execute();
    
?>

    <div class="text-center mt-5">
    <h2 class="text-success">Terima kasih kerana membeli.</h2>
    <p class="lead">Status pembayaran anda  <span class="text-warning font-weight-bold">sedang dalam proses.</span><br>Kami akan proses pesanan anda selepas status pembayaran telah berjaya.</p>
    <p>Please refer to <a href="<?php echo $home;?>profile/account.html">My Purchase</a> section for order status</p>
    </div>
    
<?php
        
    }
    if($status==3){
        
    $quporder=sqlquery("UPDATE payment_product_history SET payment_invoice=?, payment_status=?, payment_reason=?, payment_billcode=?, payment_price=?, payment_date=now() WHERE payment_order_id=?");
    $quporder->bindValue(1, $refno);
    $quporder->bindValue(2, "Gagal");
    $quporder->bindValue(3, $reason);
    $quporder->bindValue(4, $billcode);
    $quporder->bindValue(5, $amount);
    $quporder->bindValue(6, $order_id);
    $quporder->execute();
?>

    <div class="text-center mt-5">
    <h2 class="text-success">Terima kasih kerana membeli.</h2>
    <p class="lead">Status pembayaran anda <span class="text-danger font-weight-bold">tidak berjaya.</span></p>
    <?php echo "<p>Click <a href='./includes/createBill.php?menu=$menu'>HERE</a> to make a payment</p>" ?>
    </div>
    
<?php    
    
    }

?>