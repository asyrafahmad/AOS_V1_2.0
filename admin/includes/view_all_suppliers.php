   
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                  <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">


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
                                        <th colspan="3"></th>
                                        </tr>
                                        <thead>';


                            while($row = mysqli_fetch_array($result))
                            {
                                $output .= '<tbody>
                                            <tr>
                                            <td><img width="100"  src="../img/'.$row["user_image"].'"  alt="image" class="img-category" </td>
                                            <td class="align-middle">'.$row["user_username"].'</td>
                                            <td class="align-middle">'.$row["user_phone"].'</td>
                                            <td class="align-middle">'.$row["user_date_register"].'</td>
                                            <td class="text-center align-middle"><a class="btn" href="supplier.php?source=view_supplier&supplier_id='.$row["user_id"].'"><i class="fas fa-eye"></i></a>
                                                
                                                <a class="btn" href="supplier.php?source=edit_supplier&supplier_id='.$row["user_id"].'"><i class="fas fa-edit"></i></a>
                                                
                                                <a class="btn" href="supplier.php?source=view_supplier_product&supplier_id='.$row["user_id"].'"><i class="fas fa-boxes"></i></a></td>
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