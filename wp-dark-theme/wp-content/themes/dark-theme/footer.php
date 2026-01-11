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
        'telegram' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"></path><path d="m21.854 2.147-10.94 10.939"></path></svg>',
    );

    return isset( $icons[ $platform ] ) ? $icons[ $platform ] : '';
}
?>

</main><!-- #main -->

<footer id="footer" class="site-footer bg-zinc-950 border-t border-zinc-800 py-16">
    <div class="footer-container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="footer-grid grid lg:grid-cols-4 md:grid-cols-2 gap-12">
            <!-- Brand Column -->
            <div class="footer-brand">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo inline-block mb-6">
                    <span class="text-2xl font-bold text-white">
                        <?php echo esc_html( $logo_first ); ?>
                        <span class="text-blue-500"><?php echo esc_html( $logo_accent ); ?></span>
                    </span>
                </a>
                <p class="text-gray-400 mb-6 leading-relaxed">
                    <?php echo esc_html( $footer_desc ); ?>
                </p>

                <!-- Social Links -->
                <div class="social-links flex gap-3">
                    <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="social-link w-10 h-10 bg-zinc-800 rounded-lg flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all" aria-label="Facebook">
                        <?php echo dark_theme_get_social_icon( 'facebook' ); ?>
                    </a>
                    <a href="https://twitter.com" target="_blank" rel="noopener noreferrer" class="social-link w-10 h-10 bg-zinc-800 rounded-lg flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all" aria-label="Twitter">
                        <?php echo dark_theme_get_social_icon( 'twitter' ); ?>
                    </a>
                    <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="social-link w-10 h-10 bg-zinc-800 rounded-lg flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all" aria-label="Instagram">
                        <?php echo dark_theme_get_social_icon( 'instagram' ); ?>
                    </a>
                    <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="social-link w-10 h-10 bg-zinc-800 rounded-lg flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all" aria-label="LinkedIn">
                        <?php echo dark_theme_get_social_icon( 'linkedin' ); ?>
                    </a>
                </div>
            </div>

            <!-- Services Column -->
            <div class="footer-services">
                <h4 class="text-white font-semibold mb-6">Услуги</h4>
                <ul class="space-y-3">
                    <li><a href="#services" class="text-gray-400 hover:text-white transition-colors">iOS разработка</a></li>
                    <li><a href="#services" class="text-gray-400 hover:text-white transition-colors">Android разработка</a></li>
                    <li><a href="#services" class="text-gray-400 hover:text-white transition-colors">Cross-platform</a></li>
                    <li><a href="#services" class="text-gray-400 hover:text-white transition-colors">UI/UX дизайн</a></li>
                </ul>
            </div>

            <!-- Company Column -->
            <div class="footer-company">
                <h4 class="text-white font-semibold mb-6">Компания</h4>
                <ul class="space-y-3">
                    <li><a href="#about" class="text-gray-400 hover:text-white transition-colors">О нас</a></li>
                    <li><a href="#portfolio" class="text-gray-400 hover:text-white transition-colors">Портфолио</a></li>
                    <li><a href="#contact" class="text-gray-400 hover:text-white transition-colors">Контакты</a></li>
                    <li><a href="#careers" class="text-gray-400 hover:text-white transition-colors">Карьера</a></li>
                </ul>
            </div>

            <!-- Contacts Column -->
            <div class="footer-contacts">
                <h4 class="text-white font-semibold mb-6">Контакты</h4>
                <ul class="space-y-4">
                    <li>
                        <a href="mailto:hello@silverrow.io" class="flex items-center gap-3 text-gray-400 hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-400">
                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                            </svg>
                            hello@silverrow.io
                        </a>
                    </li>
                    <li>
                        <a href="tel:+74951234567" class="flex items-center gap-3 text-gray-400 hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-400">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            +7 (495) 123-45-67
                        </a>
                    </li>
                    <li class="flex items-start gap-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-400 flex-shrink-0 mt-1">
                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span>
                            Москва, Пресненская наб., 12<br>
                            <span class="text-gray-500">Башня «Федерация»</span>
                        </span>
                    </li>
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
                    <a href="#terms" class="text-gray-500 hover:text-gray-300 text-sm transition-colors">
                        Условия использования
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
