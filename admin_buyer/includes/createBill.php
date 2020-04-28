      
<?php session_start(); ?>
    

<?php

global $connection;

//*TODO: data transaction need to store into db (name,email,phone,price,status,date)

echo $user_username      = $_SESSION['user_username'];
echo $user_email         = $_SESSION['user_email'];
echo $user_phone         = $_SESSION['user_phone'];
echo $payment_price      = $_SESSION['total_price_afterConvert'];
echo $payment_status     = 0;

$query  = "INSERT INTO payment_product_history (payment_supplier_name, payment_supplier_email, payment_supplier_phone, payment_price, payment_status, payment_order_date)  ";
$query .= "VALUES ('{$user_username}', '{$user_email}', '{$user_phone}', '{$payment_price}', '{$payment_status}', now() )";
$add_order_query = mysqli_query($connection, $query);






////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//GET BANK FPX API (ID AND BANK NAME)
//$curl = curl_init();
//
//  curl_setopt($curl, CURLOPT_POST, 0);
//  curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/getBankFPX');  
//  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//
//  $result = curl_exec($curl);
//  $info = curl_getinfo($curl);  
//  curl_close($curl);
//
//  echo $result;

//[{"CODE":"ABB0233","NAME":"Affin Bank"},{"CODE":"ABMB0212","NAME":"Alliance Bank (Offline)"},{"CODE":"AMBB0209","NAME":"AmBank"},{"CODE":"BIMB0340","NAME":"Bank Islam"},{"CODE":"BMMB0341","NAME":"Bank Muamalat"},{"CODE":"BKRM0602","NAME":"Bank Rakyat"},{"CODE":"BSN0601","NAME":"BSN (Offline)"},{"CODE":"BCBB0235","NAME":"CIMB Clicks"},{"CODE":"HLB0224","NAME":"Hong Leong Bank"},{"CODE":"HSBC0223","NAME":"HSBC"},{"CODE":"KFH0346","NAME":"KFH"},{"CODE":"MBB0228","NAME":"Maybank2E"},{"CODE":"MB2U0227","NAME":"Maybank2U"},{"CODE":"OCBC0229","NAME":"OCBC Bank"},{"CODE":"PBB0233","NAME":"Public Bank"},{"CODE":"RHB0218","NAME":"RHB Bank (Offline)"},{"CODE":"TEST0021","NAME":"SBI Bank A"},{"CODE":"TEST0022","NAME":"SBI Bank B"},{"CODE":"TEST0023","NAME":"SBI Bank C"},{"CODE":"SCB0216","NAME":"Standard Chartered (Offline)"},{"CODE":"UOB0226","NAME":"UOB Bank (Offline)"}]	

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//
////CREATE CATEGORY
//  $some_data = array(
//    'catname' => 'Agro Online System', //CATEGORY NAME
//    'catdescription' => 'Paymeny for Agro Online System', //PROVIDE YOUR CATEGORY DESCRIPTION
//    'userSecretKey' => '39kqy7he-mmwt-3vkz-w9tx-2drrcdl6ndjt' //PROVIDE USER SECRET KEY HERE
//      
//  );  
//
//  $curl = curl_init();
//
//  curl_setopt($curl, CURLOPT_POST, 1);
//  curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/createCategory');  //PROVIDE API LINK HERE
//  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//  curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);
//
//  $result = curl_exec($curl);
//
//  $info = curl_getinfo($curl);  
//  curl_close($curl);
//
//  $obj = json_decode($result);
////  echo $result;
//
////categoryCode = 76q6uc4k
//
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
////CREATE BILL
//  $some_data = array(
//    'userSecretKey'=>'39kqy7he-mmwt-3vkz-w9tx-2drrcdl6ndjt',
//    'categoryCode'=>'76q6uc4k',
//    'billName'=> $_SESSION['user_username'],
//    'billDescription'=>'Bayaran untuk pembelian produk',
//    'billPriceSetting'=>1,
//    'billPayorInfo'=>1,
////    'billAmount'=>$_SESSION['total_price_afterConvert'],
//    'billAmount'=>$_SESSION['total_price_afterConvert'],
//    'billReturnUrl'=>'http://localhost/DEVELOPMENT/AOS_V1_2.0/admin_buyer/toyyibpayApi.php?menu=eselling&source=thankyou',
//    'billCallbackUrl'=>'http://localhost/DEVELOPMENT/AOS_V1_2.0/admin_buyer/toyyibpayApi.php?menu=eselling&source=thankyou',
//    'billExternalReferenceNo' => 'AFR341DFI',
//    'billTo'=>$_SESSION['user_username'],
//    'billEmail'=> $_SESSION['user_email'],
//    'billPhone'=> $_SESSION['user_phone'],   
////    'billTo'=>'asas',
////    'billEmail'=> 'asa',
////    'billPhone'=> '1212',
//    'billSplitPayment'=>0,
//    'billSplitPaymentArgs'=>'',
//    'billPaymentChannel'=>'2',
//    'billDisplayMerchant'=>1,
//    'billContentEmail'=>'Thank you for purchasing our product!',
//    'billChargeToCustomer'=>1
//  );  
//
//  $curl = curl_init();
//  curl_setopt($curl, CURLOPT_POST, 1);
//  curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/createBillMultiPayment');  
//  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//  curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);
//
//  $result = curl_exec($curl);
//  $info = curl_getinfo($curl);  
//  curl_close($curl);
//  $obj = json_decode($result,true);
////  echo $result;
//
//  $billcode=$obj[0]['BillCode'];
//


//https://dev.toyyibpay.com/index.php/api/createBillMultiPayment
//https://dev.toyyibpay.com/u7zkqqqz
//billCode=rm3k8iu8

//////////////////////////////////////////////////////////////////////////////////////////////




























//////////////////////////////////////////////////////////////////////////////////////////////

//RUN BILL
//  $some_data = array(
//    'userSecretKey' => '39kqy7he-mmwt-3vkz-w9tx-2drrcdl6ndjt',
//    'billCode' => $_SESSION['billCode'],
//    'billpaymentAmount' => $_SESSION['total_price_afterConvert'],
//    'billpaymentPayorName' => $_SESSION['user_username'],
//    'billpaymentPayorPhone'=> $_SESSION['user_phone'],
//    'billpaymentPayorEmail'=> $_SESSION['user_email'],
//    'billBankID'=>''
//  );  
//
//  $curl = curl_init();
//  curl_setopt($curl, CURLOPT_POST, 1);
//  curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/runBill');  
//  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//  curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);
//
//  $result = curl_exec($curl);
//  $info = curl_getinfo($curl);  
//  curl_close($curl);
//  $obj = json_decode($result);
//  echo $result;
//		




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//  $some_data = array(
//    'billCode' => 'oxekxm6b',
//    'billaymentStatus' = 1,
//  );  
//
//  $curl = curl_init();
//
//  curl_setopt($curl, CURLOPT_POST, 1);
//  curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/getBillTransactions');  
//  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//  curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);
//
//  $result = curl_exec($curl);
//  $info = curl_getinfo($curl);  
//  curl_close($curl);
//
//  echo $result;



?>


<script type="text/javascript">
   window.location.href="https://dev.toyyibpay.com/<?php echo $billcode;?>"; 
</script>
