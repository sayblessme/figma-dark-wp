<?php
/**
 * The footer for our theme
 *
 * @package Dark_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$logo_first        = dark_theme_get_field( 'logo_text_first', 'Silver' );
$logo_accent       = dark_theme_get_field( 'logo_text_accent', 'Row' );
$footer_desc       = dark_theme_get_field( 'footer_description', 'Создаем мобильные приложения, которые помогают бизнесу расти и развиваться.' );
$copyright         = dark_theme_get_field( 'footer_copyright', '2024 Silver Row. Все права защищены.' );
$social_links      = dark_theme_get_field( 'social_links', array() );
?>

</main><!-- #main -->

<footer id="footer" class="site-footer bg-zinc-950 border-t border-zinc-800 py-16">
    <div class="footer-container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="footer-grid grid lg:grid-cols-4 md:grid-cols-2 gap-12">
            <!-- Brand Column -->
            <div class="footer-brand lg:col-span-2">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo inline-block mb-6">
                    <span class="text-2xl font-bold text-white">
                        <?php echo esc_html( $logo_first ); ?>
                        <span class="text-blue-500"><?php echo esc_html( $logo_accent ); ?></span>
                    </span>
                </a>
                <p class="text-gray-400 mb-6 max-w-md leading-relaxed">
                    <?php echo esc_html( $footer_desc ); ?>
                </p>

                <?php if ( ! empty( $social_links ) && is_array( $social_links ) ) : ?>
                <div class="social-links flex gap-4">
                    <?php foreach ( $social_links as $social ) :
                        $platform = isset( $social['platform'] ) ? $social['platform'] : '';
                        $url = isset( $social['url'] ) ? $social['url'] : '';
                        if ( empty( $url ) ) continue;
                    ?>
                        <a href="<?php echo esc_url( $url ); ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="social-link w-10 h-10 bg-zinc-800 rounded-lg flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all"
                           aria-label="<?php echo esc_attr( ucfirst( $platform ) ); ?>">
                            <?php echo dark_theme_get_social_icon( $platform ); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>

            <!-- Quick Links -->
            <div class="footer-links">
                <h4 class="text-white font-semibold mb-6">Навигация</h4>
                <?php
                if ( has_nav_menu( 'footer' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu space-y-3',
                        'container'      => false,
                        'depth'          => 1,
                        'fallback_cb'    => false,
                    ) );
                } else {
                    ?>
                    <ul class="footer-menu space-y-3">
                        <li><a href="#services" class="text-gray-400 hover:text-white transition-colors">Услуги</a></li>
                        <li><a href="#portfolio" class="text-gray-400 hover:text-white transition-colors">Портфолио</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition-colors">Контакты</a></li>
                    </ul>
                    <?php
                }
                ?>
            </div>

            <!-- Services -->
            <div class="footer-services">
                <h4 class="text-white font-semibold mb-6">Услуги</h4>
                <ul class="space-y-3">
                    <li><a href="#services" class="text-gray-400 hover:text-white transition-colors">iOS разработка</a></li>
                    <li><a href="#services" class="text-gray-400 hover:text-white transition-colors">Android разработка</a></li>
                    <li><a href="#services" class="text-gray-400 hover:text-white transition-colors">Cross-platform</a></li>
                    <li><a href="#services" class="text-gray-400 hover:text-white transition-colors">UI/UX дизайн</a></li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="footer-bottom mt-12 pt-8 border-t border-zinc-800">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-500 text-sm">
                    &copy; <?php echo esc_html( $copyright ); ?>
                </p>
                <div class="footer-bottom-links flex gap-6">
                    <a href="<?php echo esc_url( get_privacy_policy_url() ); ?>" class="text-gray-500 hover:text-gray-300 text-sm transition-colors">
                        Политика конфиденциальности
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
<?php

/**
 * Get social icon SVG
 */
function dark_theme_get_social_icon( $platform ) {
    $icons = array(
        'telegram' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"></path><path d="m21.854 2.147-10.94 10.939"></path></svg>',
        'whatsapp' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21l1.65-3.8a9 9 0 1 1 3.4 2.9L3 21"></path><path d="M9 10a.5.5 0 0 0 1 0V9a.5.5 0 0 0-1 0v1a5 5 0 0 0 5 5h1a.5.5 0 0 0 0-1h-1a.5.5 0 0 0 0 1"></path></svg>',
        'instagram' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line></svg>',
        'linkedin' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect width="4" height="12" x="2" y="9"></rect><circle cx="4" cy="4" r="2"></circle></svg>',
        'github' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"></path><path d="M9 18c-4.51 2-5-2-7-2"></path></svg>',
    );

    return isset( $icons[ $platform ] ) ? $icons[ $platform ] : '';
}
