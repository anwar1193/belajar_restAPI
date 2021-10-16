<?php

	$data = file_get_contents('pizza.json');
	$menu = json_decode($data, true); //harus trus supaya jadi array assosiatif, kalo gak true jadi object
	
	$menu_makanan = $menu["menu"]; //"menu" diambil dari object di pizza.json

?>
<!doctype html>
<html lang="en">
  <head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

	<title>Belajar JSON</title>
  </head>
  <body>
	
	
	<!-- Navbar -->
	
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <div class="container"> <!-- Dibungkus di container supaya agak kepinggir -->
	  	<a class="navbar-brand" href="#"><img src="img/logo.png" width="120"/></a>
	  
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
			  <a class="nav-item nav-link active" href="#">Home</a>
			</div>
		  </div>
	  </div>
	</nav>
	
	<!-- Penutup Navbar -->
	
	<div class="container"><!-- Container Konten -->
		
		<div class="row mt-3"> <!-- row konten Judul All Menu -> mt-3 adalah margin-top 3 / margin kebawah -->
			<div class="col">
				<h1>All Menu</h1>
			</div>
		</div> <!-- penutup row konten Judul All menu -->
		
		<div class="row"> <!-- row menu -->
		
			<?php
			
				foreach($menu_makanan as $data){
			
			?>
			<div class="col-md-4">
				
				<div class="card mt-3">
				  <img src="<?php echo $data['gambar']; ?>" class="card-img-top" alt="...">
				  <div class="card-body">
					<h5 class="card-title"><?php echo $data['nama']; ?></h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					<h5 class="card-title"><?php echo 'Rp '.$data['harga']; ?></h5>
					<a href="#" class="btn btn-primary">Pesan Sekarang</a>
				  </div>
				</div>
				
			</div>
			<?php } ?>
			
		</div><!-- penutup row menu -->
		
	</div><!-- Penutup Container Konten -->
	

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="jquery-3.4.1.js"></script> <!-- Jquery nya harus yang ini jangan yang slim (dari jquery cdn -->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

	<script src="bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>