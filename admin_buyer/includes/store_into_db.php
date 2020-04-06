


    <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Status</h1>
          </div>


      <!-- Starting of profile content-->
      <div class="card shadow mb-6">
        <div class="card-body">
            
            
        <div class="row" >
            &nbsp;&nbsp;&nbsp;<h1>Pengesahan Pembelian</h1>
        </div><br>
            
            
            <?php
            
                if(isset($_GET['s_db']){
                    
                    $product_order_id = $_GET['s_db'];
                    
                    $amount = $_GET['amt'];
                    $currency = $_GET['cc'];
                    $transaction = $_GET['tx'];
                    $status = $_GET['st'];

                   
                    $query = "INSERT INTO buyer_order_product(order_amount, order_tran, supplier_email, supplier_phone, supplier_address, supplier_website, supplier_date_register )  ";
                    $query .= "VALUES('{$admin_supplier_image}', '{$admin_supplier_name}', '{$admin_supplier_email}', '{$admin_supplier_phone}', '{$admin_supplier_address}', '{$admin_supplier_website}', now()  )  ";

                    $create_post_query  =   mysqli_query($connection, $query);

                    // function
                    confirmQuery($create_post_query);

                })
                 
            ?>
            
       <h1>Tahniah anda maklumat produk telah berjaya disimpan</h1>
            
          </div> </div>
    