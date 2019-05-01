<?php status_header(200); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>
<body>
  <?php 
   if ( !is_user_logged_in() ) {
   	echo "<script>window.location.replace('/wp-admin')</script>";
   }else{
  ?>
  
  <div id="app"></div>
  
  <?php } ?>

  <?php wp_footer(); ?>
</body>
</html>