<?php
/**
 * The header for our theme
 *
 * @package Dark_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$logo_first  = dark_theme_get_field( 'logo_text_first', 'Silver' );
$logo_accent = dark_theme_get_field( 'logo_text_accent', 'Row' );
$button_text = dark_theme_get_field( 'header_button_text', 'Связаться' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class( 'min-h-screen bg-zinc-950' ); ?>>
<?php wp_body_open(); ?>

<header class="site-header fixed top-0 left-0 right-0 z-50 bg-zinc-900/95 backdrop-blur-sm border-b border-zinc-800" role="banner">
    <div class="header-container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="header-inner flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="site-branding flex-shrink-0">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" rel="home">
                    <h1 class="text-2xl font-bold text-white">
                        <?php echo esc_html( $logo_first ); ?>
                        <span class="text-blue-500"><?php echo esc_html( $logo_accent ); ?></span>
                    </h1>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="main-navigation hidden md:flex space-x-8" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'dark-theme' ); ?>">
                <?php
                if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'primary-menu flex space-x-8',
                        'container'      => false,
                        'depth'          => 1,
                        'walker'         => new Dark_Theme_Nav_Walker(),
                        'fallback_cb'    => false,
                    ) );
                } else {
                    // Default menu items if no menu is set
                    ?>
                    <ul class="primary-menu flex space-x-8">
                        <li><a href="#services" class="nav-link text-gray-300 hover:text-white transition-colors">Услуги</a></li>
                        <li><a href="#portfolio" class="nav-link text-gray-300 hover:text-white transition-colors">Портфолио</a></li>
                        <li><a href="#contact" class="nav-link text-gray-300 hover:text-white transition-colors">Контакты</a></li>
                    </ul>
                    <?php
                }
                ?>
            </nav>

            <!-- CTA Button (Desktop) -->
            <div class="header-cta hidden md:block">
                <a href="#contact" class="btn btn-primary px-6 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <?php echo esc_html( $button_text ); ?>
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle md:hidden text-white p-2" aria-controls="mobile-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle menu', 'dark-theme' ); ?>">
                <svg class="menu-icon w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <line x1="4" x2="20" y1="12" y2="12"></line>
                    <line x1="4" x2="20" y1="6" y2="6"></line>
                    <line x1="4" x2="20" y1="18" y2="18"></line>
                </svg>
                <svg class="close-icon w-6 h-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <nav id="mobile-menu" class="mobile-navigation md:hidden hidden" role="navigation" aria-label="<?php esc_attr_e( 'Mobile Menu', 'dark-theme' ); ?>">
            <div class="mobile-menu-inner py-4 border-t border-zinc-800">
                <?php
                if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'mobile-menu space-y-4',
                        'container'      => false,
                        'depth'          => 1,
                        'fallback_cb'    => false,
                    ) );
                } else {
                    ?>
                    <ul class="mobile-menu space-y-4">
                        <li><a href="#services" class="block text-gray-300 hover:text-white transition-colors py-2">Услуги</a></li>
                        <li><a href="#portfolio" class="block text-gray-300 hover:text-white transition-colors py-2">Портфолио</a></li>
                        <li><a href="#contact" class="block text-gray-300 hover:text-white transition-colors py-2">Контакты</a></li>
                    </ul>
                    <?php
                }
                ?>
                <div class="mobile-cta mt-6">
                    <a href="#contact" class="btn btn-primary block text-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                        <?php echo esc_html( $button_text ); ?>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>

<main id="main" class="site-main">
