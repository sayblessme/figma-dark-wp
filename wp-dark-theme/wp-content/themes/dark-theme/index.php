<?php
/**
 * The main template file
 *
 * @package Dark_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<section class="blog-section pt-24 bg-zinc-950 min-h-screen">
    <div class="blog-container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        <header class="blog-header text-center mb-16">
            <h1 class="blog-title text-4xl lg:text-5xl font-bold text-white mb-6">
                <?php
                if ( is_home() && ! is_front_page() ) {
                    single_post_title();
                } else {
                    esc_html_e( 'Блог', 'dark-theme' );
                }
                ?>
            </h1>
            <p class="blog-description text-xl text-gray-400">
                <?php esc_html_e( 'Новости, статьи и полезные материалы о разработке мобильных приложений', 'dark-theme' ); ?>
            </p>
        </header>

        <?php if ( have_posts() ) : ?>

        <div class="posts-grid grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card group bg-zinc-900 rounded-2xl overflow-hidden border border-zinc-800 hover:border-blue-500/50 transition-all' ); ?>>

                <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>" class="post-thumbnail-link block h-48 overflow-hidden">
                    <?php the_post_thumbnail( 'medium_large', array(
                        'class' => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-500',
                    ) ); ?>
                </a>
                <?php endif; ?>

                <div class="post-content p-6">
                    <div class="post-meta text-sm text-gray-400 mb-3">
                        <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                            <?php echo esc_html( get_the_date() ); ?>
                        </time>
                    </div>

                    <h2 class="post-title text-xl font-semibold text-white mb-3">
                        <a href="<?php the_permalink(); ?>" class="hover:text-blue-400 transition-colors">
                            <?php the_title(); ?>
                        </a>
                    </h2>

                    <div class="post-excerpt text-gray-400 mb-4">
                        <?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
                    </div>

                    <a href="<?php the_permalink(); ?>" class="read-more inline-flex items-center gap-2 text-blue-400 font-medium hover:text-blue-300 transition-colors">
                        <?php esc_html_e( 'Читать далее', 'dark-theme' ); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </article>

            <?php endwhile; ?>
        </div>

        <nav class="pagination mt-16 flex justify-center">
            <?php
            the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => '&larr; ' . esc_html__( 'Назад', 'dark-theme' ),
                'next_text' => esc_html__( 'Вперед', 'dark-theme' ) . ' &rarr;',
            ) );
            ?>
        </nav>

        <?php else : ?>

        <div class="no-posts text-center py-16">
            <p class="text-xl text-gray-400">
                <?php esc_html_e( 'Записей пока нет.', 'dark-theme' ); ?>
            </p>
        </div>

        <?php endif; ?>

    </div>
</section>

<?php
get_footer();
