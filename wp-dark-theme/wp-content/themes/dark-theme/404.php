<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Dark_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<section class="error-404 min-h-screen flex items-center justify-center bg-gradient-to-br from-zinc-900 via-zinc-900 to-blue-950 pt-16">
    <div class="error-container max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
        <div class="error-code text-9xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400 mb-8">
            404
        </div>

        <h1 class="error-title text-3xl sm:text-4xl font-bold text-white mb-6">
            <?php esc_html_e( 'Страница не найдена', 'dark-theme' ); ?>
        </h1>

        <p class="error-description text-lg text-gray-400 mb-10 max-w-md mx-auto">
            <?php esc_html_e( 'К сожалению, страница, которую вы ищете, не существует или была перемещена.', 'dark-theme' ); ?>
        </p>

        <div class="error-actions flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary px-8 py-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                <?php esc_html_e( 'На главную', 'dark-theme' ); ?>
            </a>

            <a href="#contact" class="btn btn-secondary px-8 py-4 bg-zinc-800 text-white rounded-lg hover:bg-zinc-700 transition-colors flex items-center justify-center gap-2 border border-zinc-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                </svg>
                <?php esc_html_e( 'Связаться с нами', 'dark-theme' ); ?>
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
