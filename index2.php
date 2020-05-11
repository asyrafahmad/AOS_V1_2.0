  <?php
                        

                    
                    
                        $connect = mysqli_connect("localhost", "root", "", "agro_db");
                        $output = '';

                        if(isset($_POST["query"]))
                        {
                            $search = mysqli_real_escape_string($connect, $_POST["query"]);
                            $query = "SELECT * FROM product WHERE  product_name LIKE '%".$search."%'   ";
                        }
                        else
                        {
                            $query = "SELECT * FROM product WHERE product_category = '{$product_category}' ";                         
                        }

                        $result = mysqli_query($connect, $query);

                        if(mysqli_num_rows($result) > 0)
                        {

                            while($row = mysqli_fetch_array($result))
                            {
                                $output .= '
                                            <div class="mt-2">	
                                            <div class="card" style="width: 140px;">	
                                            <a href="login.php" align="center"><img class="img-category mb-2" width="40%" height="40%" src="img/'.$row['product_image'].'" ></a>
                                            <a class="cat-title" align="center">'.$row['product_name'].'</a>		 	  
                                            <div class="card-body">  	   
                                            </div>		  
                                            </div>		
                                            </div>	
                                            ';
                            }

                            echo $output;
                        }
                        else
                        {
                            echo 'Tiada Maklumat Dijumpai';
                        }
                    
                
                    
                        ?>
                