<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AOS</title>
	<link rel="stylesheet" href="https:cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Code+Pro:400,900|Source+Sans+Pro:300,+900&display=swap">

	<link rel="stylesheet" href="css/mainpage.css">
</head>

<body>

	<div class="container-fluid">

		<nav class="navbar p-4">
		  <a class="navbar-brand" href="#">
		    <img src="img/bg/logo-02.png" width="80" height="100%" alt="AOS">
		  </a>

		  <ul class="nav__list">
		  	<li><a href="register.php"><button type="button" class="btn btn-outline-success btn__signup">Sign Up</button></a></li>
		  	<li><a href="login.php"><button type="button" class="btn btn-outline-success btn__signin">Sign In</button></a></li>
		  </ul>

		</nav>
		
		<div class="col-md-12">
			<div class="row justify-content-end mb-3">
				<div class="col-4 mainpage__search">
					<div class="input-group">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="search"><i class="fas fa-search"></i></span>
					  </div>
					  <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search">
					</div>
				</div>
			</div>

			<div class="row justify-content-center" class="mainpage__main">
				<div class="col-md-4 col-sm-12 mainpage__left">
					<div class="mainpage__desc" >
						<h2><b>Agro Online System</b></h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<div class="row justify-content-center mt-5">
							<a href="aboutus.php" class="btn btn-success">Mengenai Kami</a>
						</div>
					</div>
				</div>

				<div class="col-6 mainpage__right ml-5">
					<div class="mainpage__desc px-5" >
						<div class="row">
							<h4>Kategori</h4>	
						</div>
						
						<div class="row">
							<div class="mt-2">
								<div class="card" style="width: 140px;">
								  <img src="img/banana.png" class="img-category" alt="..." >
								  <div class="card-body">
								    <p class="card-text">Nama Kategori</p>
								  </div>
								</div>
							</div>
						</div>
					</div>
				</div>			
			</div>	
		</div>
		
	</div>

</body>
</html>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>