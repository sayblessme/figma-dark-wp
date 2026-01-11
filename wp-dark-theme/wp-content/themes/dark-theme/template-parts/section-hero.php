<?php
/**
 * Hero Section Template
 *
 * @package Dark_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get ACF fields with defaults
$badge            = dark_theme_get_field( 'hero_badge', 'Разработка мобильных приложений' );
$title_first      = dark_theme_get_field( 'hero_title_first', 'Создаем приложения,' );
$title_gradient   = dark_theme_get_field( 'hero_title_gradient', 'которые работают' );
$description      = dark_theme_get_field( 'hero_description', 'Превращаем ваши идеи в мощные мобильные приложения для iOS и Android. Полный цикл разработки от концепции до запуска.' );
$button_primary   = dark_theme_get_field( 'hero_button_primary', 'Бесплатная консультация' );
$button_secondary = dark_theme_get_field( 'hero_button_secondary', 'Написать в Telegram' );
$telegram_link    = dark_theme_get_field( 'hero_telegram_link', 'https://t.me/your_telegram' );
$hero_image       = dark_theme_get_field( 'hero_image', array() );
$stats            = dark_theme_get_field( 'hero_stats', array() );

// Default stats if not set
if ( empty( $stats ) ) {
    $stats = array(
        array( 'number' => '150+', 'label' => 'Проектов' ),
        array( 'number' => '95%', 'label' => 'Довольных клиентов' ),
        array( 'number' => '7+', 'label' => 'Лет опыта' ),
    );
}

// Default hero image
$hero_image_url = ! empty( $hero_image['url'] ) ? $hero_image['url'] : DARK_THEME_URI . '/assets/images/hero-image.jpg';
$hero_image_alt = ! empty( $hero_image['alt'] ) ? $hero_image['alt'] : 'Mobile App Development';
?>

<section id="hero" class="hero-section relative min-h-screen flex items-center justify-center bg-gradient-to-br from-zinc-900 via-zinc-900 to-blue-950 pt-16">
    <!-- Background Pattern -->
    <div class="hero-pattern absolute inset-0 opacity-40" aria-hidden="true"></div>

    <div class="hero-container relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="hero-grid grid lg:grid-cols-2 gap-12 items-center">
            <!-- Content Column -->
            <div class="hero-content space-y-8">
                <!-- Badge -->
                <div class="hero-badge-wrapper inline-block">
                    <span class="hero-badge px-4 py-2 bg-blue-600/20 text-blue-400 rounded-full text-sm border border-blue-500/30 inline-flex items-center gap-2">
                        <span class="badge-icon">🚀</span>
                        <?php echo esc_html( $badge ); ?>
                    </span>
                </div>

                <!-- Title -->
                <h1 class="hero-title text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight">
                    <?php echo esc_html( $title_first ); ?>
                    <span class="hero-title-gradient block text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">
                        <?php echo esc_html( $title_gradient ); ?>
                    </span>
                </h1>

                <!-- Description -->
                <p class="hero-description text-lg sm:text-xl text-gray-400 leading-relaxed max-w-xl">
                    <?php echo esc_html( $description ); ?>
                </p>

                <!-- CTA Buttons -->
                <div class="hero-buttons flex flex-col sm:flex-row gap-4">
                    <button type="button" class="btn btn-primary group px-8 py-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all flex items-center justify-center gap-2" data-action="scroll-to-contact">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-calendar" aria-hidden="true">
                            <path d="M8 2v4"></path>
                            <path d="M16 2v4"></path>
                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                            <path d="M3 10h18"></path>
                        </svg>
                        <?php echo esc_html( $button_primary ); ?>
                    </button>

                    <a href="<?php echo esc_url( $telegram_link ); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-telegram px-8 py-4 bg-telegram text-white rounded-lg hover:bg-telegram-hover transition-colors flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-send" aria-hidden="true">
                            <path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"></path>
                            <path d="m21.854 2.147-10.94 10.939"></path>
                        </svg>
                        <?php echo esc_html( $button_secondary ); ?>
                    </a>
                </div>

                <!-- Stats -->
                <?php if ( ! empty( $stats ) ) : ?>
                <div class="hero-stats grid grid-cols-3 gap-6 pt-8 border-t border-zinc-800">
                    <?php foreach ( $stats as $stat ) : ?>
                    <div class="stat-item">
                        <div class="stat-number text-2xl sm:text-3xl font-bold text-white">
                            <?php echo esc_html( $stat['number'] ); ?>
                        </div>
                        <div class="stat-label text-sm text-gray-400 mt-1">
                            <?php echo esc_html( $stat['label'] ); ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>

            <!-- Image Column -->
            <div class="hero-image-wrapper relative">
                <div class="hero-image-container relative z-10">
                    <img
                        src="<?php echo esc_url( $hero_image_url ); ?>"
                        alt="<?php echo esc_attr( $hero_image_alt ); ?>"
                        class="hero-image rounded-2xl shadow-2xl w-full h-auto"
                        loading="eager"
                    >
                </div>
                <!-- Decorative Blurs -->
                <div class="hero-blur hero-blur-1 absolute -top-4 -right-4 w-72 h-72 bg-blue-600/20 rounded-full blur-3xl" aria-hidden="true"></div>
                <div class="hero-blur hero-blur-2 absolute -bottom-4 -left-4 w-72 h-72 bg-cyan-600/20 rounded-full blur-3xl" aria-hidden="true"></div>
            </div>
        </div>
    </div>
</section>
