<?php
/**
 * The template for displaying all single posts
 *
 * @package Dark_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post pt-24' ); ?>>
    <div class="post-container max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <?php while ( have_posts() ) : the_post(); ?>

        <header class="post-header mb-12">
            <div class="post-meta flex items-center gap-4 mb-6 text-sm text-gray-400">
                <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" class="post-date">
                    <?php echo esc_html( get_the_date() ); ?>
                </time>
                <?php if ( has_category() ) : ?>
                <span class="post-categories">
                    <?php the_category( ', ' ); ?>
                </span>
                <?php endif; ?>
            </div>

            <h1 class="post-title text-4xl lg:text-5xl font-bold text-white mb-6 leading-tight">
                <?php the_title(); ?>
            </h1>

            <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail mb-8">
                <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-auto rounded-2xl' ) ); ?>
            </div>
            <?php endif; ?>
        </header>

        <div class="post-content prose prose-invert prose-lg max-w-none">
            <?php the_content(); ?>
        </div>

        <footer class="post-footer mt-12 pt-8 border-t border-zinc-800">
            <?php if ( has_tag() ) : ?>
            <div class="post-tags flex flex-wrap gap-2">
                <?php the_tags( '<span class="text-gray-400 mr-2">Теги:</span>', '', '' ); ?>
            </div>
            <?php endif; ?>

            <nav class="post-navigation mt-8 grid md:grid-cols-2 gap-4">
                <?php
                $prev_post = get_previous_post();
                $next_post = get_next_post();
                ?>

                <?php if ( $prev_post ) : ?>
                <a href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>" class="nav-prev p-4 bg-zinc-900 rounded-lg border border-zinc-800 hover:border-blue-500/50 transition-all">
                    <span class="text-sm text-gray-400 block mb-1">&larr; Предыдущая</span>
                    <span class="text-white font-medium"><?php echo esc_html( get_the_title( $prev_post ) ); ?></span>
                </a>
                <?php endif; ?>

                <?php if ( $next_post ) : ?>
                <a href="<?php echo esc_url( get_permalink( $next_post ) ); ?>" class="nav-next p-4 bg-zinc-900 rounded-lg border border-zinc-800 hover:border-blue-500/50 transition-all text-right md:col-start-2">
                    <span class="text-sm text-gray-400 block mb-1">Следующая &rarr;</span>
                    <span class="text-white font-medium"><?php echo esc_html( get_the_title( $next_post ) ); ?></span>
                </a>
                <?php endif; ?>
            </nav>
        </footer>

        <?php endwhile; ?>
    </div>
</article>

<?php
get_footer();
