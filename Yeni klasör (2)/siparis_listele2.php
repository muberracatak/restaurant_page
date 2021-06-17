<?php

$servername = "localhost";
$username = "root";
$password = "Mub147852.";
$db = "285271";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

$filtre = "";
if (isset($_GET["yemek_id "])) {
    $filtre .= "and yemek_id  like '" . $_GET["yemek_id "] . "%' ";
}
if (isset($_GET["yemek_ad"])) {
    $filtre .= "and yemek_ad like '" . $_GET["yemek_ad"] . "%' ";
}
if (isset($_GET["yemek_kategori"])) {
    $filtre .= "and yemek_kategori like '" . $_GET["yemek_kategori"] . "%' ";
}




$sql = "
		SELECT * FROM yemek


	";

    //echo $sql;die;


$cvp = mysqli_query($conn, $sql);
if (!$cvp) {
    echo '<br>Hata: ' . mysqli_error($conn);
} 
?>

<!DOCTYPE html>
<html lang="zxx">
    

<head>        

<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sipariş LİSTESİ</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />    
	<link href="menu.css" rel="stylesheet" />
    </head>

    <body>

    <div class="container">
	<!-- Top box -->
		<!-- Logo & Site Name -->
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="resim.jpg">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
                            &nbsp;
							<img src="resim.jpg" alt="Logo" class="tm-site-logo" /> 
							<div class="tm-site-text-box">
								<h1 class="tm-site-title">Sipariş LİSTESİ</h1>	
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Sipariş Sistemine Hoşgeldiniz !!!</h2>
				<p class="col-12 text-center"></p>
			</header>
			
         
            <?php
            $kitap_kategoriler = "";

            $sql_query = "SELECT * FROM yemek
            WHERE yemek.yemek_id = '".$row['yemek_id']."'";
            
            $getir = mysqli_query($conn, $sql_query);
       
            ?>
			<!-- Gallery -->
			<div class="row tm-gallery">
				<!-- gallery page 1 -->
				<div id="tm-gallery-page-pizza" class="tm-gallery-page">
					<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
						
                               <figcaption>
								<h4 class="tm-gallery-title"><?= $row["yemek_ad"]; ?></h4>
								<p class="tm-gallery-description"><?= $row["yemek_kategori"]; ?></p>
								
							</figcaption>
                                
							
						
					</article>
					
				</div> <!-- gallery page 3 -->
			</div>
		
		</main>

	
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
	<script>
		$(document).ready(function(){
			// Handle click on paging links
			$('.tm-paging-link').click(function(e){
				e.preventDefault();
				
				var page = $(this).text().toLowerCase();
				$('.tm-gallery-page').addClass('hidden');
				$('#tm-gallery-page-' + page).removeClass('hidden');
				$('.tm-paging-link').removeClass('active');
				$(this).addClass("active");
			});
		});
	</script>


    </body>
  

</html>