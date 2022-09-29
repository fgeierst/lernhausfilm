<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package bootcake
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<!--colr style-->
<?php 
$bodyc=get_theme_mod('themescode-body-text-color','#343434');
$themec=get_theme_mod('tcode-theme-color','#FF781F');
 ?>
<style type="text/css">
body{
    font-family:'<?php echo get_theme_mod('themescode-body-font-name','Open Sans');?>', sans-serif;
    color: <?php echo $bodyc; ?>; 
    font-size:<?php echo get_theme_mod('themescode-bodyfs','16');?>px;
    margin-top: 80px;
    line-height: 28px;      
}
/* main color */
.entry-meta i,
.navbar > .container .navbar-brand, 
h1.entry-title a,
a,
h1.entry-title{
color: <?php echo $themec; ?>; 
}
h1.entry-title a,h1.entry-title,h1.widget-title{
   font-size:<?php echo get_theme_mod('themescode-heading-one-font','26');?>px; 
}
nav.navbar-nav li a{
  background-color:<?php echo get_theme_mod('themescode-hover-color');?>; 
}
.table-striped>tbody>tr:nth-child(odd)>td, .table-striped>tbody>tr:nth-child(odd)>th, 
.tagcloud a,
.btn-default,
.btn-more,
.up-icon a,
.form-submit input{
    background-color:<?php echo $themec; ?>;
}
.navbar-default .navbar-nav > li > a{
  font-size: 16px;
}
.navbar-default .navbar-nav > .active > a,
 .navbar-default .navbar-nav > .active > a:hover,
  .navbar-default .navbar-nav > .active > a:focus,
   .navbar-default .navbar-nav > li > a:hover, 
   .navbar-default .navbar-nav > li > a:focus,
    .navbar-default .navbar-nav > .open > a, 
    .navbar-default .navbar-nav > .open > a:hover,
     .navbar-default .navbar-nav > .open > a:focus,
      .dropdown-menu > li > a:hover, 
      .dropdown-menu > li > a:focus, 
      .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
       .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus{
        background-color:<?php echo $themec; ?>;
        color: #fff;
       }

.btn-default{
    border: 1px solid <?php echo $themec;?>;
} 
.btn-more{
  border: 1px solid <?php echo $themec;?>;
}
a.btn-more:hover{
  color:<?php echo $themec;?>;
}

/* Hover Text Color */
a:hover,
aside.widget-area a:hover,
h1.entry-title a:hover,
h1.entry-title:hover
{
color: <?php echo $bodyc; ?>; 
}

/* Hover BG Color */
.btn-default:hover{
  background-color: <?php echo $bodyc; ?>;
  border: 1px solid <?php echo $bodyc;?>;

}

</style>

</head>

<body <?php body_class(); ?>>

<?php 
 $GLOBALS['readMore'] =get_theme_mod('themescode-change-read-more','Read More');
 ?>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only"><?php _e( 'Toggle navigation', 'bootcake' ); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand brand-name" href="<?php echo home_url(); ?>">
               <?php bloginfo('name'); ?>
            </a>
    </div>

        <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
    </div>
</nav>
