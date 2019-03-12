<!DOCTYPE html>
<html>
<head>
  <title>Kosaya Photography</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link href="http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700,400italic" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=IM+Fell+French+Canon+SC" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
  <?php wp_head(); ?>
</head>
<body>
  
  <div id="top" class="intro">
    <div class="splash fadein">
      <div class="logotype">
        <h1>Kosaya</h1>
        <h2>Photography</h2>
      </div>
    </div>
  </div><!--intro-->
  
  <header class="header">
    <div class="container-fluid">
      <div class="row">
        <div class="logo col-md-3 col-sm-3 col-xs-6"><h1>Kosaya</h1></div><!--logo-->
        <nav class="navigation">
          <a href="#main" class="m menu-button">Menu</a>
          <ul class="nav navbar-nav">
            <li><a href="#top">Top</a></li>
            <li><a href="#portfolio">Portfolio</a></li>
            <?php wp_nav_menu(array( 'theme_location'=>'main-menu', 'container'=>false, 'items_wrap'=>'%3$s' )); ?>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </nav><!--navigation-->
      </div>
    </div>
  </header><!--header-->