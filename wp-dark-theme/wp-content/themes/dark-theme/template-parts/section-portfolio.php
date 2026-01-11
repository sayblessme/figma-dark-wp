<?php
/**
 * Portfolio Section Template
 *
 * @package Dark_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get ACF fields with defaults
$label       = dark_theme_get_field( 'portfolio_label', 'НАШЕ ПОРТФОЛИО' );
$title       = dark_theme_get_field( 'portfolio_title', 'Успешные проекты' );
$description = dark_theme_get_field( 'portfolio_description', 'Мы гордимся каждым приложением, которое создали для наших клиентов' );
$projects    = dark_theme_get_field( 'portfolio_items', array() );

// Default projects if not set - from Figma design
if ( empty( $projects ) ) {
    $projects = array(
        array(
            'image' => array( 'url' => DARK_THEME_URI . '/assets/images/portfolio-fitpro.jpg' ),
            'category' => 'Фитнес приложение',
            'title' => 'FitPro',
            'description' => 'Персональный тренер в кармане с AI-рекомендациями',
            'rating' => '4.8',
            'downloads' => '500K+ загрузок',
            'technologies' => 'iOS, Android, HealthKit',
            'link' => '#',
        ),
        array(
            'image' => array( 'url' => DARK_THEME_URI . '/assets/images/portfolio-foodhub.jpg' ),
            'category' => 'Доставка еды',
            'title' => 'FoodHub',
            'description' => 'Быстрая доставка еды из любимых ресторанов',
            'rating' => '4.9',
            'downloads' => '1M+ загрузок',
            'technologies' => 'React Native, Maps, Payments',
            'link' => '#',
        ),
        array(
            'image' => array( 'url' => DARK_THEME_URI . '/assets/images/portfolio-shopeasy.jpg' ),
            'category' => 'E-commerce',
            'title' => 'ShopEasy',
            'description' => 'Удобный онлайн-шопинг с персональными рекомендациями',
            'rating' => '4.7',
            'downloads' => '750K+ загрузок',
            'technologies' => 'Flutter, Payment Gateway, AR',
            'link' => '#',
        ),
        array(
            'image' => array( 'url' => DARK_THEME_URI . '/assets/images/portfolio-moneyflow.jpg' ),
            'category' => 'Финансы',
            'title' => 'MoneyFlow',
            'description' => 'Управление финансами и инвестициями в одном месте',
            'rating' => '4.9',
            'downloads' => '300K+ загрузок',
            'technologies' => 'Swift, Security, Analytics',
            'link' => '#',
        ),
    );
}
?>

<section id="portfolio" class="portfolio-section py-24 bg-zinc-900">
    <div class="portfolio-container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="section-header text-center max-w-3xl mx-auto mb-16">
            <span class="section-label text-blue-400 font-semibold uppercase tracking-wider">
                <?php echo esc_html( $label ); ?>
            </span>
            <h2 class="section-title mt-4 text-3xl sm:text-4xl lg:text-5xl font-bold text-white">
                <?php echo esc_html( $title ); ?>
            </h2>
            <p class="section-description mt-6 text-lg sm:text-xl text-gray-400">
                <?php echo esc_html( $description ); ?>
            </p>
        </div>

        <!-- Portfolio Grid -->
        <div class="portfolio-grid grid md:grid-cols-2 gap-8">
            <?php foreach ( $projects as $project ) :
                $image_url = isset( $project['image']['url'] ) ? $project['image']['url'] : DARK_THEME_URI . '/assets/images/portfolio-placeholder.jpg';
                $image_alt = isset( $project['image']['alt'] ) ? $project['image']['alt'] : $project['title'];
                $technologies = isset( $project['technologies'] ) ? explode( ',', $project['technologies'] ) : array();
            ?>
            <article class="portfolio-card group bg-zinc-950 rounded-2xl overflow-hidden border border-zinc-800 hover:border-blue-500/50 transition-all hover:shadow-xl hover:shadow-blue-500/10">
                <!-- Image -->
                <div class="portfolio-image-wrapper relative h-64 overflow-hidden bg-gradient-to-br from-blue-600/20 to-purple-600/20">
                    <img
                        src="<?php echo esc_url( $image_url ); ?>"
                        alt="<?php echo esc_attr( $image_alt ); ?>"
                        class="portfolio-image w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                        loading="lazy"
                        onerror="this.style.display='none'"
                    >
                    <div class="portfolio-overlay absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/50 to-transparent"></div>

                    <!-- External Link Button -->
                    <?php if ( ! empty( $project['link'] ) && '#' !== $project['link'] ) : ?>
                    <div class="portfolio-link-wrapper absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                        <a href="<?php echo esc_url( $project['link'] ); ?>" target="_blank" rel="noopener noreferrer" class="portfolio-link w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors" aria-label="<?php echo esc_attr( sprintf( __( 'View %s project', 'dark-theme' ), $project['title'] ) ); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                <path d="M15 3h6v6"></path>
                                <path d="M10 14 21 3"></path>
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                            </svg>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Content -->
                <div class="portfolio-content p-6">
                    <div class="portfolio-category text-sm text-blue-400 font-semibold mb-2">
                        <?php echo esc_html( $project['category'] ); ?>
                    </div>
                    <h3 class="portfolio-title text-2xl font-bold text-white mb-3">
                        <?php echo esc_html( $project['title'] ); ?>
                    </h3>
                    <p class="portfolio-description text-gray-400 mb-4">
                        <?php echo esc_html( $project['description'] ); ?>
                    </p>

                    <!-- Stats -->
                    <div class="portfolio-stats flex items-center gap-6 mb-4">
                        <?php if ( ! empty( $project['rating'] ) ) : ?>
                        <div class="portfolio-rating flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-yellow-400">
                                <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                            </svg>
                            <span class="text-white font-semibold"><?php echo esc_html( $project['rating'] ); ?></span>
                        </div>
                        <?php endif; ?>

                        <?php if ( ! empty( $project['downloads'] ) ) : ?>
                        <div class="portfolio-downloads text-gray-400 text-sm">
                            <?php echo esc_html( $project['downloads'] ); ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Technologies -->
                    <?php if ( ! empty( $technologies ) ) : ?>
                    <div class="portfolio-technologies flex flex-wrap gap-2">
                        <?php foreach ( $technologies as $tech ) : ?>
                        <span class="tech-tag px-3 py-1 bg-zinc-800 text-gray-300 rounded-full text-xs">
                            <?php echo esc_html( trim( $tech ) ); ?>
                        </span>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

        <!-- CTA Button -->
        <div class="portfolio-cta text-center mt-16">
            <a href="#contact" class="inline-flex items-center gap-2 px-8 py-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-semibold">
                Обсудить ваш проект
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 3h6v6"></path>
                    <path d="M10 14 21 3"></path>
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                </svg>
            </a>
        </div>
    </div>
</section>
