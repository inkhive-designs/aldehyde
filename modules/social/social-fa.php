<?php
/*
** Template to Render Social Icons on Top Bar
*/
$social_style = esc_html(get_theme_mod('aldehyde_social_icon_style_set'));

for ($i = 1; $i < 8; $i++) : 
	$social = esc_html(get_theme_mod('aldehyde_social_'.$i));
	if ( ($social != 'none') && ($social != '') ) : ?>
	<a class="<?php echo $social_style; ?>" href="<?php echo esc_url(get_theme_mod('aldehyde_social_url'.$i)); ?>"><i class="fa fa-<?php echo $social; ?>"></i></a>
	<?php endif;

endfor; ?>