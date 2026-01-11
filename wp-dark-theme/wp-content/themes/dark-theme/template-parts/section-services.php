<?php
/**
 * Services Section Template
 *
 * @package Dark_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get ACF fields with defaults
$label       = dark_theme_get_field( 'services_label', 'НАШИ УСЛУГИ' );
$title       = dark_theme_get_field( 'services_title', 'Полный цикл разработки' );
$description = dark_theme_get_field( 'services_description', 'От идеи до запуска - мы предоставляем все необходимые услуги для создания успешного приложения' );
$services    = dark_theme_get_field( 'services_items', array() );
$stats       = dark_theme_get_field( 'services_stats', array() );

// Default services if not set
if ( empty( $services ) ) {
    $services = array(
        array(
            'icon' => 'smartphone',
            'title' => 'iOS разработка',
            'description' => 'Нативные приложения для iPhone и iPad с использованием Swift и SwiftUI',
        ),
        array(
            'icon' => 'code',
            'title' => 'Android разработка',
            'description' => 'Производительные приложения на Kotlin и Java для всех Android устройств',
        ),
        array(
            'icon' => 'sparkles',
            'title' => 'Cross-platform',
            'description' => 'Кросс-платформенные решения на React Native и Flutter',
        ),
        array(
            'icon' => 'zap',
            'title' => 'UI/UX дизайн',
            'description' => 'Современный интерфейс и превосходный пользовательский опыт',
        ),
        array(
            'icon' => 'shield',
            'title' => 'Тестирование',
            'description' => 'Комплексное тестирование для обеспечения качества и надежности',
        ),
        array(
            'icon' => 'trending-up',
            'title' => 'Поддержка',
            'description' => 'Постоянная техническая поддержка и обновления приложения',
        ),
    );
}

// Default stats if not set
if ( empty( $stats ) ) {
    $stats = array(
        array(
            'number' => '100%',
            'label' => 'Качество кода',
            'description' => 'Следуем лучшим практикам и стандартам разработки',
            'color' => 'blue',
        ),
        array(
            'number' => '24/7',
            'label' => 'Поддержка',
            'description' => 'Всегда на связи для решения любых вопросов',
            'color' => 'purple',
        ),
        array(
            'number' => '30+',
            'label' => 'Экспертов',
            'description' => 'Команда профессионалов в своем деле',
            'color' => 'green',
        ),
    );
}

/**
 * Get service icon SVG
 */
function dark_theme_get_service_icon( $icon_name ) {
    $icons = array(
        'smartphone' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="20" x="5" y="2" rx="2" ry="2"></rect><path d="M12 18h.01"></path></svg>',
        'code' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>',
        'sparkles' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"></path><path d="M20 3v4"></path><path d="M22 5h-4"></path><path d="M4 17v2"></path><path d="M5 18H3"></path></svg>',
        'zap' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path></svg>',
        'shield' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path></svg>',
        'trending-up' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline><polyline points="16 7 22 7 22 13"></polyline></svg>',
    );

    return isset( $icons[ $icon_name ] ) ? $icons[ $icon_name ] : $icons['code'];
}
?>

<section id="services" class="services-section py-24 bg-zinc-950">
    <div class="services-container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="section-header text-center max-w-3xl mx-auto mb-16">
            <span class="section-label text-blue-400 font-semibold">
                <?php echo esc_html( $label ); ?>
            </span>
            <h2 class="section-title mt-4 text-3xl sm:text-4xl lg:text-5xl font-bold text-white">
                <?php echo esc_html( $title ); ?>
            </h2>
            <p class="section-description mt-6 text-lg sm:text-xl text-gray-400">
                <?php echo esc_html( $description ); ?>
            </p>
        </div>

        <!-- Services Grid -->
        <div class="services-grid grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ( $services as $service ) : ?>
            <div class="service-card group p-8 bg-zinc-900 rounded-2xl border border-zinc-800 hover:border-blue-500/50 transition-all hover:shadow-lg hover:shadow-blue-500/10">
                <div class="service-icon w-14 h-14 bg-blue-600/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600/20 transition-colors text-blue-400">
                    <?php echo dark_theme_get_service_icon( $service['icon'] ); ?>
                </div>
                <h3 class="service-title text-xl font-semibold text-white mb-3">
                    <?php echo esc_html( $service['title'] ); ?>
                </h3>
                <p class="service-description text-gray-400 leading-relaxed">
                    <?php echo esc_html( $service['description'] ); ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Stats Cards -->
        <?php if ( ! empty( $stats ) ) : ?>
        <div class="services-stats mt-24 grid lg:grid-cols-3 gap-8">
            <?php foreach ( $stats as $stat ) :
                $color = isset( $stat['color'] ) ? $stat['color'] : 'blue';
                $gradient_class = '';
                $text_color_class = '';
                $border_class = '';

                switch ( $color ) {
                    case 'purple':
                        $gradient_class = 'from-purple-600/10 to-pink-600/10';
                        $text_color_class = 'text-purple-400';
                        $border_class = 'border-purple-500/20';
                        break;
                    case 'green':
                        $gradient_class = 'from-green-600/10 to-emerald-600/10';
                        $text_color_class = 'text-green-400';
                        $border_class = 'border-green-500/20';
                        break;
                    default:
                        $gradient_class = 'from-blue-600/10 to-cyan-600/10';
                        $text_color_class = 'text-blue-400';
                        $border_class = 'border-blue-500/20';
                }
            ?>
            <div class="stat-card p-8 bg-gradient-to-br <?php echo esc_attr( $gradient_class ); ?> rounded-2xl border <?php echo esc_attr( $border_class ); ?>">
                <div class="stat-number text-4xl font-bold text-white mb-2">
                    <?php echo esc_html( $stat['number'] ); ?>
                </div>
                <div class="stat-label <?php echo esc_attr( $text_color_class ); ?> font-semibold mb-2">
                    <?php echo esc_html( $stat['label'] ); ?>
                </div>
                <p class="stat-description text-gray-400">
                    <?php echo esc_html( $stat['description'] ); ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
