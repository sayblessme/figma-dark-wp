<?php
/**
 * The front page template
 *
 * @package Dark_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<?php get_template_part( 'template-parts/section', 'hero' ); ?>

<?php get_template_part( 'template-parts/section', 'services' ); ?>

<?php get_template_part( 'template-parts/section', 'portfolio' ); ?>

<?php get_template_part( 'template-parts/section', 'contact' ); ?>

<?php
get_footer();
