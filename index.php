<?php include("includes/config.php"); ?>
<?php include("includes/init.php"); ?>

<?php

   $products = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S',
                  'T','U','V','W','X','Y','Z');

   $page_class = new pagination;
   $page_class->products_array = $products;
   $page_class->page_count = count($products);
   $page_class->webPg = "index.php";
   $page_class->products_per_page = 10;
   $page_class->set_page_variable();

   $get_products = $page_class->get_products_by_section($products);
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" 
         content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <title>Pagination</title>
      <!-- Bootstrap Core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- Main CSS -->
      <link href="css/main.css" rel="stylesheet">
   </head>
   <body>  
      <br><br><br>
      <?php $page_class->get_pagination_html(); ?>
      <section class="row">
			<div class="col-md-8 col-md-offset-2 borderRe">
				<?php
					foreach($get_products as $product){
						echo $product;
                  echo "<br><br>";
					}
				?>
			</div>		
		</section>
      <?php $page_class->get_pagination_html(); ?>
   </body>
</html>































