    <h1 class="h3 mb-2 text-gray-800">Petani</h1>
          <p class="mb-4">Senarai Petani <a target="_blank" href="https://datatables.net">@PenerajuMedia.Sdn.Bhd</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Senarai Petani</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                    <?php


                        $connect = mysqli_connect("localhost", "root", "", "agro_db");
                        $output = '';

                        if(isset($_POST["query"]))
                        {
                            $search = mysqli_real_escape_string($connect, $_POST["query"]);
                            $query = "SELECT * FROM user WHERE user_role LIKE '2' AND user_username LIKE '%".$search."%' OR user_phone LIKE '%".$search."%'  ";
                        }
                        else
                        {
                            $query = "SELECT * FROM user WHERE user_role= '2' ";
                        }

                        $result = mysqli_query($connect, $query);

                        if(mysqli_num_rows($result) > 0)
                        {
                            $output .= '<thead>
                                        <tr>
                                        <th>Gambar</th>
                                        <th>Petani</th>
                                        <th>No Telefon</th>
                                        <th>Tarikh Buka Akaun</th>
                                        <th>Profil petani</th>
                                        <th>Kemaskini Profil Petani</th>
                                        <th>Produk Petani</th>
                                        </tr>
                                        <thead>';


                            while($row = mysqli_fetch_array($result))
                            {
                                $output .= '<tbody>
                                            <tr>
                                            <td><img width="100"  src="../img/'.$row["user_image"].'"  alt="image" class="rounded-circle" </td>
                                            <td>'.$row["user_username"].'</td>
                                            <td>'.$row["user_phone"].'</td>
                                            <td>'.$row["user_date_register"].'</td>
                                            <td><a class="btn btn-info" href="supplier.php?source=view_supplier&supplier_id='.$row["user_id"].'">Lihat Profil </a></td>
                                            <td><a class="btn btn-info" href="supplier.php?source=edit_supplier&supplier_id='.$row["user_id"].'">Kemaskini Profil</a></td>
                                            <td><a class="btn btn-info" href="supplier.php?source=view_supplier_product&supplier_id='.$row["user_id"].'">Lihat Produk </a></td>
                                            </tr>
                                            <tbody>';
                            }

                            echo $output;
                        }
                        else
                        {
                            echo 'Data Not Found';
                        }


                    ?>
                  
                      </table>
                    </div>
                </div>
          </div>