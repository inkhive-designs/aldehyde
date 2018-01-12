<header id="masthead" class="site-header" role="banner" data-parallax="scroll" data-image-src="<?php echo get_header_image() ?>" data-position-x="<?php echo get_theme_mod('aldehyde_himg_align','center'); ?>;" >

    <?php get_template_part('modules/header/top-bar'); ?>

    <div class="container">
        <?php $aldehyde_branding_class =  get_theme_mod('aldehyde_center_logo') ? 'col-md-12 col-sm-12 col-xs-12' : 'col-md-4';
        $aldehyde_menu_class =  get_theme_mod('aldehyde_center_logo') ? 'col-md-12' : 'col-md-8';  ?>
        <div class="site-branding <?php echo $aldehyde_branding_class; ?>">
            <?php if ( get_theme_mod('aldehyde_logo') != "" ) : ?>
                <div id="site-logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo esc_url(get_theme_mod('aldehyde_logo')); ?>"></a>
                </div>
            <?php endif; ?>
            <div id="text-title-desc">
                <h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </div>
        </div>


        <nav id="site-navigation" class="main-navigation <?php echo $aldehyde_menu_class; ?>" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
        </nav><!-- #site-navigation -->
        <div id="slickmenu"></div>

    </div>	<!--container-->

    <?php get_template_part('slider', 'nivo' ); ?>

</header><!-- #masthead -->
