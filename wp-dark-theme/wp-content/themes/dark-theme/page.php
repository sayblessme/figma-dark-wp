<?php
/**
 * The template for displaying all pages
 *
 * @package Dark_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<article id="page-<?php the_ID(); ?>" <?php post_class( 'page-content pt-24' ); ?>>
    <div class="page-container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <?php while ( have_posts() ) : the_post(); ?>

        <header class="page-header mb-12">
            <h1 class="page-title text-4xl lg:text-5xl font-bold text-white mb-6">
                <?php the_title(); ?>
            </h1>
        </header>

        <div class="page-body prose prose-invert prose-lg max-w-none">
            <?php the_content(); ?>
        </div>

        <?php endwhile; ?>
    </div>
</article>

<?php
get_footer();
