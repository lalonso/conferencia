 <?php if( eventiz_fnc_theme_options('logo') ):  ?>
<div id="pbr-logo" class="logo">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img src="<?php echo eventiz_fnc_theme_options('logo'); ?>" alt="<?php bloginfo( 'name' ); ?>">
    </a>
</div>
<?php else: ?>
    <div id="pbr-logo" class="logo logo-theme">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
             <img src="<?php echo get_template_directory_uri() . '/images/logo.png'; ?>" alt="<?php bloginfo( 'name' ); ?>" />
        </a>
    </div>
<?php endif; ?>