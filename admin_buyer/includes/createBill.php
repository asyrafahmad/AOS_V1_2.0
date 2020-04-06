
<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>


<?php


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

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//CREATE CATEGORY
  $some_data = array(
    'catname' => 'Agro Online System', //CATEGORY NAME
    'catdescription' => 'Paymeny for Agro Online System', //PROVIDE YOUR CATEGORY DESCRIPTION
    'userSecretKey' => '39kqy7he-mmwt-3vkz-w9tx-2drrcdl6ndjt' //PROVIDE USER SECRET KEY HERE
      
  );  

  $curl = curl_init();

  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/createCategory');  //PROVIDE API LINK HERE
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);

  $result = curl_exec($curl);

  $info = curl_getinfo($curl);  
  curl_close($curl);

  $obj = json_decode($result);
  echo $result;

//categoryCode = 76q6uc4k

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   
        global $connection;
        $query  =  "SELECT * FROM buyer ";    
        $select_buyer = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_buyer)){

            $buyer_id = escape($row['buyer_id']);
            $buyer_name = escape($row['buyer_name']);
            $buyer_phone = escape($row['buyer_phoneNo']);
            $buyer_email = escape($row['buyer_email']);
            $buyer_website = escape($row['buyer_website']);
            $buyer_state = escape($row['buyer_state']);
            $buyer_address = escape($row['buyer_address']);
                             
        }


//CREATE BILL
  $some_data = array(
    'userSecretKey'=>'39kqy7he-mmwt-3vkz-w9tx-2drrcdl6ndjt',
    'categoryCode'=>'76q6uc4k',
    'billName'=> $_SESSION['user_username'],
    'billDescription'=>'Payment for buying product',
    'billPriceSetting'=>0,
    'billPayorInfo'=>0,
    'billAmount'=>$_SESSION['total_price_afterConvert'],
    'billReturnUrl'=>'',
    'billCallbackUrl'=>'',
    'billExternalReferenceNo' => 'AFR341DFI',
    'billTo'=>'',
    'billEmail'=> $buyer_email,
    'billPhone'=> $buyer_phone,
    'billSplitPayment'=>0,
    'billSplitPaymentArgs'=>'',
    'billPaymentChannel'=>'2',
    'billDisplayMerchant'=>1,
    'billContentEmail'=>'Thank you for purchasing our product!',
    'billChargeToCustomer'=>1
  );  

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/createBill');  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);

  $result = curl_exec($curl);
  $info = curl_getinfo($curl);  
  curl_close($curl);
  $obj = json_decode($result);
  echo $result;

//billCode=rm3k8iu8

//////////////////////////////////////////////////////////////////////////////////////////////

//RUN BILL
  $some_data = array(
    'userSecretKey' => '39kqy7he-mmwt-3vkz-w9tx-2drrcdl6ndjt',
    'billCode' => 'rm3k8iu8',
    'billpaymentAmount' => $_SESSION['total_price_afterConvert'],
    'billpaymentPayorName' => $_SESSION['user_username'],
    'billpaymentPayorPhone'=>$buyer_phone,
    'billpaymentPayorEmail'=>$buyer_email,
    'billBankID'=>''
  );  

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/runBill');  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);

  $result = curl_exec($curl);
  $info = curl_getinfo($curl);  
  curl_close($curl);
  $obj = json_decode($result);
  echo $result;
		


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		
?>

