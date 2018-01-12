<div id="top-bar">
    <div class="container">
        <div id="top-menu">
            <?php wp_nav_menu( array( 'theme_location' => 'top', /* 'link_before' => '<span class="hvr-shutter-in-vertical">', 'link_after' => '</span>' */ ) ); ?>
        </div>
        <div class="social-icons">
            <?php get_template_part('modules/social/social', 'fa'); ?>
            <a id="searchicon">
                <i class="fa fa-search"></i>
            </a>
        </div>
    </div>
</div>
