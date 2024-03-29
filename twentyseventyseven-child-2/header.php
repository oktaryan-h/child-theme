<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="<?php echo site_url(); ?>">

          <?php
          if ( ! empty( of_get_option('upload-logo') ) ) {
          ?>
            <img width="150" height="50" src="<?php echo of_get_option('upload-logo'); ?>">
          <?php
          }
          else {
            bloginfo('name');
          }
          ?>
          </a>
          
        <div class="nav-collapse collapse">
          <ul class="nav">

            <?php wp_list_pages( array( 'title_li' => '' ) ); ?>

          </ul>
        </div><!--/.nav-collapse -->
        <div class="navbar-text pull-right"><p><?php echo of_get_option('blog-description','The 2077 Blog'); // bloginfo('description'); ?></p></div>
      </div>
    </div>
  </div>

  <div class="container">
    <div>
      <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    </div>