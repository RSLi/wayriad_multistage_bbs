<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A website where users can share imagined plans and designs for peer-editing to make the world better">
        <meta name="keywords" content="idea, exchange, creativity, student created, non profit, inspiration">
        <title><?php echo $title?> | Wayriad - Envision and Revision every Inspiration</title>
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">

        <script type="text/javascript" src="/js/jquery.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="manifest" href="/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
    </head>
    <body>
        
        
            <!--Nav bar-->
            <div class="navbar navbar-inverse navbar-fixed-top">
              <div class="container-fluid">
                <div class="navbar-header">
                	<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
		                <span class="sr-only">Toggle navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
                  <a class="navbar-brand" href="<?php echo site_url('home')?>">Wayriad</a>
                </div>
                <div id="navbarCollapse" class="collapse navbar-collapse">
                  <ul class="nav navbar-nav">
                    <li><a href="<?php echo site_url('discover')?>">Discover</a></li>
                    <li><a href="<?php echo site_url('about')?>">About</a></li> 
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                  <?php if(isset($_SESSION['uid'])){?>
		                <li class="dropdown">
		                	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
		                		<span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['username']?><span class="caret"></span>
		                	</a>
					          <ul class="dropdown-menu">
					          	<li><a href="<?php echo site_url('create')?>">Create New...</a></li>
					            <li><a href="<?php echo site_url('users_main/logout')?>">Log out</a></li>
					            
					          </ul>
		                </li>
		           <?php }else{?>
		                <li>
		                	<a href=<?php echo site_url('')?>><span class="glyphicon glyphicon-user"></span>Log in</a>
		                </li>
		           <?php }?>
		          </ul>
                </div>
              </div>
            </div>
            
            