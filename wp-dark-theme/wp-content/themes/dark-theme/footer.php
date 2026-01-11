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
$footer_desc       = dark_theme_get_field( 'footer_description', 'Создаем инновационные мобильные приложения, которые меняют мир.' );
$copyright         = dark_theme_get_field( 'footer_copyright', '2026 Silver Row. Все права защищены.' );

/**
 * Get social icon SVG
 */
function dark_theme_get_social_icon( $platform ) {
    $icons = array(
        'facebook' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>',
        'twitter' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg>',
        'instagram' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line></svg>',
        'linkedin' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect width="4" height="12" x="2" y="9"></rect><circle cx="4" cy="4" r="2"></circle></svg>',
    );

    return isset( $icons[ $platform ] ) ? $icons[ $platform ] : '';
}
?>

</main><!-- #main -->

<footer class="site-footer bg-zinc-950 border-t border-zinc-800">
    <div class="footer-container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="footer-grid grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            <!-- Brand Column -->
            <div class="footer-brand">
                <h3 class="text-2xl font-bold text-white mb-4">
                    <?php echo esc_html( $logo_first ); ?> <span class="text-blue-500"><?php echo esc_html( $logo_accent ); ?></span>
                </h3>
                <p class="text-gray-400 mb-4">
                    <?php echo esc_html( $footer_desc ); ?>
                </p>

                <!-- Social Links -->
                <div class="social-links flex gap-3">
                    <a href="#" class="w-10 h-10 bg-zinc-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors text-white" aria-label="Facebook">
                        <?php echo dark_theme_get_social_icon( 'facebook' ); ?>
                    </a>
                    <a href="#" class="w-10 h-10 bg-zinc-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors text-white" aria-label="Twitter">
                        <?php echo dark_theme_get_social_icon( 'twitter' ); ?>
                    </a>
                    <a href="#" class="w-10 h-10 bg-zinc-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors text-white" aria-label="Instagram">
                        <?php echo dark_theme_get_social_icon( 'instagram' ); ?>
                    </a>
                    <a href="#" class="w-10 h-10 bg-zinc-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors text-white" aria-label="LinkedIn">
                        <?php echo dark_theme_get_social_icon( 'linkedin' ); ?>
                    </a>
                </div>
            </div>

            <!-- Services Column -->
            <div class="footer-services">
                <h4 class="text-white font-semibold mb-4">Услуги</h4>
                <ul class="space-y-2">
                    <li><a href="#services" class="text-gray-400 hover:text-white transition-colors">iOS разработка</a></li>
                    <li><a href="#services" class="text-gray-400 hover:text-white transition-colors">Android разработка</a></li>
                    <li><a href="#services" class="text-gray-400 hover:text-white transition-colors">Cross-platform</a></li>
                    <li><a href="#services" class="text-gray-400 hover:text-white transition-colors">UI/UX дизайн</a></li>
                </ul>
            </div>

            <!-- Company Column -->
            <div class="footer-company">
                <h4 class="text-white font-semibold mb-4">Компания</h4>
                <ul class="space-y-2">
                    <li><a href="#services" class="text-gray-400 hover:text-white transition-colors">О нас</a></li>
                    <li><a href="#portfolio" class="text-gray-400 hover:text-white transition-colors">Портфолио</a></li>
                    <li><a href="#contact" class="text-gray-400 hover:text-white transition-colors">Контакты</a></li>
                    <li><a href="#contact" class="text-gray-400 hover:text-white transition-colors">Карьера</a></li>
                </ul>
            </div>

            <!-- Contacts Column -->
            <div class="footer-contacts">
                <h4 class="text-white font-semibold mb-4">Контакты</h4>
                <ul class="space-y-2 text-gray-400">
                    <li>hello@silverrow.io</li>
                    <li>+7 (495) 123-45-67</li>
                    <li>Москва, Пресненская наб., 12<br>Башня «Федерация»</li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="footer-bottom pt-8 border-t border-zinc-800 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-gray-400 text-sm">
                &copy; <?php echo esc_html( $copyright ); ?>
            </p>
            <div class="footer-bottom-links flex gap-6 text-sm">
                <a href="<?php echo esc_url( get_privacy_policy_url() ?: '#' ); ?>" class="text-gray-400 hover:text-white transition-colors">
                    Политика конфиденциальности
                </a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors">
                    Условия использования
                </a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
