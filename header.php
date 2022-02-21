<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ua">
<head>
<script data-ad-client="ca-pub-6597380782970700" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php wp_title(); ?></title>
    
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
    <?php if ( is_singular() && get_option( 'thread_comments' ) )
            wp_enqueue_script( 'comment-reply' );   
    ?>
    <script data-ad-client="ca-pub-6597380782970700" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script src="https://cdn.gravitec.net/storage/cb84553ab9faa87f957970361e7687e9/client.js" async></script>

</head>

<body <?php body_class(); ?>>
	<?php $zz_surl = home_url();?>
    <div id="fb-root"></div>
    
	<div class="mainwrapper">
		<div class="container">
    		<div class="white-content">
            	<div class="topwrap">
                	<?php
                    if ( function_exists( 'the_ad_placement' ) ) {
                        the_ad_placement( 'ad-top' );
                    }
                	?>
                </div>
                <header id="header">
                	<div class="d-flex align-items-center">
                    	<div class="col-6 col-lg-4 col-logo">
                        	<?php $logo_src = $zz_surl.'/im/logo.png';
							if (is_front_page()) { ?>
								<span id="logo">
									<img src="<?=$logo_src?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
								</span>
							<?php } else { ?>
								<a id="logo" href="<?php echo $zz_surl; ?>/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
									<img src="<?=$logo_src?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
								</a>
							<?php } ?>
                            <span class="logo-desc">Новини Тернополя і області</span>
                        </div>
                        <div class="col-6 col-lg-8 col-menu">
                        	<div class="d-flex justify-content-end justify-content-lg-between header-inner">
                                <nav id="navi" class="navbar-collapse collapse d-lg-block">
                                    <div class="navi-row d-lg-flex flex-wrap justify-content-xl-between">
                                        <?php
                                           $menu_options = array(
                                                'theme_location' => 'main-menu',
                                                'container' => false,
                                                'menu_class' => 'navbar-nav nav-main flex-lg-row',
                                                'menu_id' => 'menu-main-menu'
                                            );
                                            wp_nav_menu($menu_options);
                                        ?>
                                        <ul class="header-socials navbar-nav flex-row d-none d-lg-flex">
                                            <?php 
                                            if ($fb_link = get_theme_mod('facebook_link')) echo '<li><a target="_blank" href="'.$fb_link.'"><i class="fab fa-facebook-f"></i></a></li>';
                                            if ($twitter_link = get_theme_mod('twitter_link')) echo '<li><a target="_blank" href="'.$twitter_link.'"><i class="fab fa-twitter"></i></a></li>';
                                            if ($telegram_link = get_theme_mod('telegram_link')) echo '<li><a target="_blank" href="'.$telegram_link.'"><i class="fab fa-telegram-plane"></i></a></li>';
                                            if ($youtube_link = get_theme_mod('youtube_link')) echo '<li><a target="_blank" href="'.$youtube_link.'"><i class="fab fa-youtube"></i></a></li>';
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="actual-themes d-flex flex-wrap">
                                        <div class="actual-themes-label">Спецтеми:</div>
                                        <?php
                                           $menu_options = array(
                                                'theme_location' => 'themes-menu',
                                                'container' => false,
                                                'menu_class' => 'navbar-nav nav-themes flex-row',
                                                'menu_id' => 'menu-themes-menu'
                                            );
                                            wp_nav_menu($menu_options);
                                        ?>
                                    </div>
                                    <ul class="header-socials navbar-nav flex-row d-flex justify-content-center d-lg-none">
                                        <?php 
                                        if ($fb_link = get_theme_mod('facebook_link')) echo '<li><a target="_blank" href="'.$fb_link.'"><i class="fab fa-facebook-f"></i></a></li>';
                                        if ($twitter_link = get_theme_mod('twitter_link')) echo '<li><a target="_blank" href="'.$twitter_link.'"><i class="fab fa-twitter"></i></a></li>';
                                        if ($telegram_link = get_theme_mod('telegram_link')) echo '<li><a target="_blank" href="'.$telegram_link.'"><i class="fab fa-telegram-plane"></i></a></li>';
                                        if ($youtube_link = get_theme_mod('youtube_link')) echo '<li><a target="_blank" href="'.$youtube_link.'"><i class="fab fa-youtube"></i></a></li>';
                                        ?>    
                                    </ul>
                                </nav>
                                <div class="header-right d-flex">
                                    <div class="header-search">
                                        <div class="search-inner">
                                            <div class="search-toggle"><i class="fa fa-search"></i></div>
                                            <?php get_search_form(); ?>
                                        </div>
                                    </div>
                                    <button class="navbar-toggler navbar-main-toggler d-lg-none collapsed" type="button" data-toggle="collapse" data-target="#navi" aria-controls="naviCollapse"><span></span><span></span><span></span><span></span></button>
                                </div>
                            </div><!-- end .header-inner -->
                        </div>
              		</div>
              	</header>
                <div class="content-wrap">
