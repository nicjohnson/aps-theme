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
        <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">

        <!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.1.0.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <header>
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                        <div class="nav-collapse collapse">
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
                            <?php get_search_form(); ?>
                        </div><!--/.nav-collapse -->
                    </div>
                </div>
            </div>
        </header>

        <div class="container">