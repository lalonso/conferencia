<?php
/**
 * The Header for our theme: Top has Logo left + search right . Below is horizal main menu
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Prestabrain
 * @subpackage Presta_Base
 * @since PrestaBase 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="viewport" content="width=device-width">
   <link rel="profile" href="http://gmpg.org/xfn/11">
   <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
   <!--[if lt IE 9]>
   <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
   <![endif]-->
   <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site"><div class="pbr-page-inner row-offcanvas row-offcanvas-left">
   <?php if ( get_header_image() ) : ?>
   <div id="site-header" class="hidden-xs hidden-sm">
      <a href="<?php echo esc_url( get_option('header_image_link','#') ); ?>" rel="home">
         <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
      </a>
   </div>
   <?php endif; ?>
   <?php 
    do_action( 'eventiz_template_header_before' ); ?>
   <header id="pbr-masthead" class="site-header" role="banner">
      <div class="container"><div class="row">
         <div class="header-main">
            <div class="logo-wrapper col-lg-2 space-top-20 pull-left">
               <?php get_template_part( 'page-templates/parts/logo-2' ); ?>
            </div>
         
         <section id="pbr-mainmenu" class="pbr-mainmenu col-lg-10 col-md-10 col-xs-12 pull-right">      
              <div class="inner navbar-mega-simple pull-right"><?php get_template_part( 'page-templates/parts/nav' ); ?></div>
               <div id="search-container" class="search-box-wrapper">
                  <div class="pbr-dropdow-search dropdown">
                     <a data-target=".bs-search-modal-lg" data-toggle="modal" class="search-focus btn dropdown-toggle dropdown-toggle-overlay"> 
                            <i class="fa fa-search"></i>     
                        </a>
                        <div class="modal fade bs-search-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <button aria-label="Close" data-dismiss="modal" class="close btn btn-sm btn-primary pull-right" type="button"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                                  <h4 id="gridSystemModalLabel" class="modal-title">Search</h4>
                                </div>
                                <div class="modal-body">
                                  <?php get_template_part( 'page-templates/parts/search-overlay' ); ?>
                                </div>
                            </div>
                          </div>
                        </div>
                  </div>
              </div>
         </section>
         </div>
      </div></div>
      <?php do_action( 'eventiz_template_header_after' ); ?>
   </header><!-- #masthead -->

   <section id="main" class="site-main">
