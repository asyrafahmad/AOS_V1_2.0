  <!-- enctype is   -->
     <form action="" method="post" enctype="multipart/form-data">
    
        <div class="container-fluid">

          <!-- Starting of profile content-->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">User information</h6>
            </div>
            <div class="card-body">

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
      
        <div class="form-group">
                <input class="btn btn-primary" type="submit" name="edit_user" value="Update">
        </div>
  
                  
                </div>
                </div>

          <!--End of profile content-->
           </div> 
     </form> 

       