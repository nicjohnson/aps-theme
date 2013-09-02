<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700|Inika:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/bootstrap3.min.css">
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">

        <!--[if lt IE 9]>
        <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/ie8.css">
            <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <header class="content">
<!--             <div class="container">
                <div class="masthead">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/aps-logo.jpg" width="140px">
                    <?php get_search_form(); ?>
                </div>
            </div> -->
            <div class="color-bar">
                <div class="container">
                <nav class="navbar navbar-inverse" role="navigation">
                      <!-- Brand and toggle get grouped for better mobile display -->
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name') ?></a>
                      </div>

                      <!-- Collect the nav links, forms, and other content for toggling -->
                      <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav">
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <?php $args = array(
                                    'title_li' => '',
                                    'depth' => 1
                                    );
                                    wp_list_categories( $args ); 
                                ?>
                            </ul>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manufacturers <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <?php $args = array(
                                    'title_li' => '',
                                    'taxonomy' => 'manufacturers',
                                    'depth' => 1
                                    );
                                    wp_list_categories( $args ); 
                                ?>
                            </ul>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Applications <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <?php $args = array(
                                    'title_li' => '',
                                    'taxonomy' => 'applications',
                                    'depth' => 1
                                    );
                                    wp_list_categories( $args ); 
                                ?>
                            </ul>
                          </li>
                          <?php 
                                    $args = array('depth' => 0, 'title_li' => '' );
                                    wp_list_pages( $args ); 
                                ?>
                        </ul>
                        
                        <div class="nav navbar-nav navbar-right">
                            <?php get_search_form(); ?>
                        </div>
                      </div><!-- /.navbar-collapse -->
                    </nav>


<!--                     <div class="navbar navbar-inverse" role="navigation">
                        <a class="btn navbar-btn" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <div class="navbar-collapse collapse">
                            <ul class="nav">
                                <li class="active"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <?php 
                                            $args = array(
                                                          'title_li' => '',
                                                          // 'taxonomy' => 'categories',
                                                          'depth' => 1
                                                          );
                                            wp_list_categories( $args ); 
                                        ?>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Applications <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <?php 
                                            $args = array(
                                                          'title_li' => '',
                                                          'taxonomy' => 'applications',
                                                          'depth' => 1
                                                          );
                                            wp_list_categories( $args ); 
                                        ?>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manufacturers <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <?php 
                                            $args = array(
                                                          'title_li' => '',
                                                          'taxonomy' => 'manufacturers',
                                                          'depth' => 1
                                                          );
                                            wp_list_categories( $args ); 
                                        ?>
                                    </ul>
                                </li>
                                <?php 
                                    $args = array('depth' => 0, 'title_li' => '' );
                                    wp_list_pages( $args ); 
                                ?>
                            </ul>
                            
                        </div> --><!--/.navbar-collapse -->
                    </div>
                </div>
            </div>
        </header>
        
        <div id="wrapper" class="container content">