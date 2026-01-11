<?php
/**
 * Dark Theme functions and definitions
 *
 * @package Dark_Theme
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'DARK_THEME_VERSION', '1.0.0' );
define( 'DARK_THEME_DIR', get_template_directory() );
define( 'DARK_THEME_URI', get_template_directory_uri() );

/**
 * Theme setup
 */
function dark_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support( 'post-thumbnails' );

    // Add custom image sizes
    add_image_size( 'hero-image', 800, 600, true );
    add_image_size( 'portfolio-thumb', 600, 400, true );
    add_image_size( 'service-icon', 56, 56, true );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'dark-theme' ),
        'footer'  => esc_html__( 'Footer Menu', 'dark-theme' ),
    ) );

    // Switch default core markup to output valid HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 40,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Add support for responsive embeds
    add_theme_support( 'responsive-embeds' );

    // Remove default block styles (we use custom styles)
    add_theme_support( 'wp-block-styles' );
}
add_action( 'after_setup_theme', 'dark_theme_setup' );

/**
 * Enqueue scripts and styles
 */
function dark_theme_scripts() {
    // Main stylesheet
    wp_enqueue_style(
        'dark-theme-style',
        DARK_THEME_URI . '/assets/css/main.css',
        array(),
        DARK_THEME_VERSION
    );

    // Main JavaScript
    wp_enqueue_script(
        'dark-theme-script',
        DARK_THEME_URI . '/assets/js/main.js',
        array(),
        DARK_THEME_VERSION,
        true
    );

    // Localize script for AJAX
    wp_localize_script( 'dark-theme-script', 'darkTheme', array(
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'dark_theme_nonce' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'dark_theme_scripts' );

/**
 * Remove WordPress default styles
 */
function dark_theme_remove_default_styles() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' );
    wp_dequeue_style( 'global-styles' );
}
add_action( 'wp_enqueue_scripts', 'dark_theme_remove_default_styles', 100 );

/**
 * ACF Options Page
 */
function dark_theme_acf_options_page() {
    if ( function_exists( 'acf_add_options_page' ) ) {
        acf_add_options_page( array(
            'page_title' => __( 'Theme Settings', 'dark-theme' ),
            'menu_title' => __( 'Theme Settings', 'dark-theme' ),
            'menu_slug'  => 'theme-settings',
            'capability' => 'edit_posts',
            'redirect'   => false,
            'icon_url'   => 'dashicons-admin-customizer',
            'position'   => 2,
        ) );
    }
}
add_action( 'acf/init', 'dark_theme_acf_options_page' );

/**
 * ACF JSON save point
 */
function dark_theme_acf_json_save_point( $path ) {
    return DARK_THEME_DIR . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'dark_theme_acf_json_save_point' );

/**
 * ACF JSON load point
 */
function dark_theme_acf_json_load_point( $paths ) {
    unset( $paths[0] );
    $paths[] = DARK_THEME_DIR . '/acf-json';
    return $paths;
}
add_filter( 'acf/settings/load_json', 'dark_theme_acf_json_load_point' );

/**
 * Register ACF fields programmatically
 */
function dark_theme_register_acf_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    // Header Settings
    acf_add_local_field_group( array(
        'key' => 'group_header',
        'title' => 'Header Settings',
        'fields' => array(
            array(
                'key' => 'field_logo_text',
                'label' => 'Logo Text (First Part)',
                'name' => 'logo_text_first',
                'type' => 'text',
                'default_value' => 'Silver',
            ),
            array(
                'key' => 'field_logo_text_accent',
                'label' => 'Logo Text (Accent Part)',
                'name' => 'logo_text_accent',
                'type' => 'text',
                'default_value' => 'Row',
            ),
            array(
                'key' => 'field_header_button_text',
                'label' => 'Header Button Text',
                'name' => 'header_button_text',
                'type' => 'text',
                'default_value' => 'Связаться',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-settings',
                ),
            ),
        ),
    ) );

    // Hero Section
    acf_add_local_field_group( array(
        'key' => 'group_hero',
        'title' => 'Hero Section',
        'fields' => array(
            array(
                'key' => 'field_hero_badge',
                'label' => 'Badge Text',
                'name' => 'hero_badge',
                'type' => 'text',
                'default_value' => 'Разработка мобильных приложений',
            ),
            array(
                'key' => 'field_hero_title',
                'label' => 'Title (First Line)',
                'name' => 'hero_title_first',
                'type' => 'text',
                'default_value' => 'Создаем приложения,',
            ),
            array(
                'key' => 'field_hero_title_gradient',
                'label' => 'Title (Gradient Line)',
                'name' => 'hero_title_gradient',
                'type' => 'text',
                'default_value' => 'которые работают',
            ),
            array(
                'key' => 'field_hero_description',
                'label' => 'Description',
                'name' => 'hero_description',
                'type' => 'textarea',
                'default_value' => 'Превращаем ваши идеи в мощные мобильные приложения для iOS и Android. Полный цикл разработки от концепции до запуска.',
                'rows' => 3,
            ),
            array(
                'key' => 'field_hero_button_primary',
                'label' => 'Primary Button Text',
                'name' => 'hero_button_primary',
                'type' => 'text',
                'default_value' => 'Бесплатная консультация',
            ),
            array(
                'key' => 'field_hero_button_secondary',
                'label' => 'Secondary Button Text',
                'name' => 'hero_button_secondary',
                'type' => 'text',
                'default_value' => 'Написать в Telegram',
            ),
            array(
                'key' => 'field_hero_telegram_link',
                'label' => 'Telegram Link',
                'name' => 'hero_telegram_link',
                'type' => 'url',
                'default_value' => 'https://t.me/your_telegram',
            ),
            array(
                'key' => 'field_hero_image',
                'label' => 'Hero Image',
                'name' => 'hero_image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
            ),
            array(
                'key' => 'field_hero_stats',
                'label' => 'Statistics',
                'name' => 'hero_stats',
                'type' => 'repeater',
                'min' => 1,
                'max' => 3,
                'layout' => 'table',
                'sub_fields' => array(
                    array(
                        'key' => 'field_stat_number',
                        'label' => 'Number',
                        'name' => 'number',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_stat_label',
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'text',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-settings',
                ),
            ),
        ),
    ) );

    // Services Section
    acf_add_local_field_group( array(
        'key' => 'group_services',
        'title' => 'Services Section',
        'fields' => array(
            array(
                'key' => 'field_services_label',
                'label' => 'Section Label',
                'name' => 'services_label',
                'type' => 'text',
                'default_value' => 'НАШИ УСЛУГИ',
            ),
            array(
                'key' => 'field_services_title',
                'label' => 'Section Title',
                'name' => 'services_title',
                'type' => 'text',
                'default_value' => 'Полный цикл разработки',
            ),
            array(
                'key' => 'field_services_description',
                'label' => 'Section Description',
                'name' => 'services_description',
                'type' => 'textarea',
                'default_value' => 'От идеи до запуска - мы предоставляем все необходимые услуги для создания успешного приложения',
                'rows' => 2,
            ),
            array(
                'key' => 'field_services_items',
                'label' => 'Services',
                'name' => 'services_items',
                'type' => 'repeater',
                'min' => 1,
                'max' => 6,
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_service_icon',
                        'label' => 'Icon (SVG code or class)',
                        'name' => 'icon',
                        'type' => 'text',
                        'instructions' => 'Enter icon name: smartphone, code, sparkles, zap, shield, trending-up',
                    ),
                    array(
                        'key' => 'field_service_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_service_description',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 2,
                    ),
                ),
            ),
            array(
                'key' => 'field_services_stats',
                'label' => 'Statistics Cards',
                'name' => 'services_stats',
                'type' => 'repeater',
                'min' => 1,
                'max' => 3,
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_service_stat_number',
                        'label' => 'Number',
                        'name' => 'number',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_service_stat_label',
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_service_stat_description',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 2,
                    ),
                    array(
                        'key' => 'field_service_stat_color',
                        'label' => 'Color Theme',
                        'name' => 'color',
                        'type' => 'select',
                        'choices' => array(
                            'blue' => 'Blue',
                            'purple' => 'Purple',
                            'green' => 'Green',
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-settings',
                ),
            ),
        ),
    ) );

    // Portfolio Section
    acf_add_local_field_group( array(
        'key' => 'group_portfolio',
        'title' => 'Portfolio Section',
        'fields' => array(
            array(
                'key' => 'field_portfolio_label',
                'label' => 'Section Label',
                'name' => 'portfolio_label',
                'type' => 'text',
                'default_value' => 'НАШЕ ПОРТФОЛИО',
            ),
            array(
                'key' => 'field_portfolio_title',
                'label' => 'Section Title',
                'name' => 'portfolio_title',
                'type' => 'text',
                'default_value' => 'Успешные проекты',
            ),
            array(
                'key' => 'field_portfolio_description',
                'label' => 'Section Description',
                'name' => 'portfolio_description',
                'type' => 'textarea',
                'default_value' => 'Мы гордимся каждым приложением, которое создали для наших клиентов',
                'rows' => 2,
            ),
            array(
                'key' => 'field_portfolio_items',
                'label' => 'Portfolio Items',
                'name' => 'portfolio_items',
                'type' => 'repeater',
                'min' => 1,
                'max' => 6,
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_portfolio_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                    ),
                    array(
                        'key' => 'field_portfolio_category',
                        'label' => 'Category',
                        'name' => 'category',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_portfolio_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_portfolio_desc',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 2,
                    ),
                    array(
                        'key' => 'field_portfolio_rating',
                        'label' => 'Rating',
                        'name' => 'rating',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_portfolio_downloads',
                        'label' => 'Downloads',
                        'name' => 'downloads',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_portfolio_technologies',
                        'label' => 'Technologies',
                        'name' => 'technologies',
                        'type' => 'text',
                        'instructions' => 'Comma separated: Swift, Firebase, etc.',
                    ),
                    array(
                        'key' => 'field_portfolio_link',
                        'label' => 'Project Link',
                        'name' => 'link',
                        'type' => 'url',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-settings',
                ),
            ),
        ),
    ) );

    // Contact Section
    acf_add_local_field_group( array(
        'key' => 'group_contact',
        'title' => 'Contact Section',
        'fields' => array(
            array(
                'key' => 'field_contact_label',
                'label' => 'Section Label',
                'name' => 'contact_label',
                'type' => 'text',
                'default_value' => 'КОНТАКТЫ',
            ),
            array(
                'key' => 'field_contact_title',
                'label' => 'Section Title',
                'name' => 'contact_title',
                'type' => 'text',
                'default_value' => 'Давайте обсудим ваш проект',
            ),
            array(
                'key' => 'field_contact_description',
                'label' => 'Section Description',
                'name' => 'contact_description',
                'type' => 'textarea',
                'default_value' => 'Оставьте заявку и мы свяжемся с вами в течение 24 часов',
                'rows' => 2,
            ),
            array(
                'key' => 'field_contact_info',
                'label' => 'Contact Information',
                'name' => 'contact_info',
                'type' => 'repeater',
                'min' => 1,
                'max' => 4,
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_contact_icon',
                        'label' => 'Icon',
                        'name' => 'icon',
                        'type' => 'text',
                        'instructions' => 'Enter icon name: mail, phone, map-pin, clock',
                    ),
                    array(
                        'key' => 'field_contact_label_text',
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_contact_value',
                        'label' => 'Value',
                        'name' => 'value',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_contact_link',
                        'label' => 'Link (optional)',
                        'name' => 'link',
                        'type' => 'url',
                    ),
                ),
            ),
            array(
                'key' => 'field_form_name_placeholder',
                'label' => 'Name Field Placeholder',
                'name' => 'form_name_placeholder',
                'type' => 'text',
                'default_value' => 'Ваше имя',
            ),
            array(
                'key' => 'field_form_email_placeholder',
                'label' => 'Email Field Placeholder',
                'name' => 'form_email_placeholder',
                'type' => 'text',
                'default_value' => 'Email',
            ),
            array(
                'key' => 'field_form_phone_placeholder',
                'label' => 'Phone Field Placeholder',
                'name' => 'form_phone_placeholder',
                'type' => 'text',
                'default_value' => 'Телефон',
            ),
            array(
                'key' => 'field_form_message_placeholder',
                'label' => 'Message Field Placeholder',
                'name' => 'form_message_placeholder',
                'type' => 'text',
                'default_value' => 'Сообщение',
            ),
            array(
                'key' => 'field_form_button_text',
                'label' => 'Submit Button Text',
                'name' => 'form_button_text',
                'type' => 'text',
                'default_value' => 'Отправить заявку',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-settings',
                ),
            ),
        ),
    ) );

    // Footer Section
    acf_add_local_field_group( array(
        'key' => 'group_footer',
        'title' => 'Footer Section',
        'fields' => array(
            array(
                'key' => 'field_footer_description',
                'label' => 'Footer Description',
                'name' => 'footer_description',
                'type' => 'textarea',
                'default_value' => 'Создаем мобильные приложения, которые помогают бизнесу расти и развиваться.',
                'rows' => 2,
            ),
            array(
                'key' => 'field_footer_copyright',
                'label' => 'Copyright Text',
                'name' => 'footer_copyright',
                'type' => 'text',
                'default_value' => '2024 Silver Row. Все права защищены.',
            ),
            array(
                'key' => 'field_social_links',
                'label' => 'Social Links',
                'name' => 'social_links',
                'type' => 'repeater',
                'min' => 0,
                'max' => 5,
                'layout' => 'table',
                'sub_fields' => array(
                    array(
                        'key' => 'field_social_platform',
                        'label' => 'Platform',
                        'name' => 'platform',
                        'type' => 'select',
                        'choices' => array(
                            'telegram' => 'Telegram',
                            'whatsapp' => 'WhatsApp',
                            'instagram' => 'Instagram',
                            'linkedin' => 'LinkedIn',
                            'github' => 'GitHub',
                        ),
                    ),
                    array(
                        'key' => 'field_social_url',
                        'label' => 'URL',
                        'name' => 'url',
                        'type' => 'url',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-settings',
                ),
            ),
        ),
    ) );
}
add_action( 'acf/init', 'dark_theme_register_acf_fields' );

/**
 * Helper function to get ACF field with fallback
 */
function dark_theme_get_field( $field_name, $default = '' ) {
    if ( function_exists( 'get_field' ) ) {
        $value = get_field( $field_name, 'option' );
        return $value ? $value : $default;
    }
    return $default;
}

/**
 * Helper function to safely output field value
 */
function dark_theme_the_field( $field_name, $default = '' ) {
    echo esc_html( dark_theme_get_field( $field_name, $default ) );
}

/**
 * Contact form AJAX handler
 */
function dark_theme_contact_form_handler() {
    check_ajax_referer( 'dark_theme_nonce', 'nonce' );

    $name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
    $email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
    $phone   = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
    $message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

    if ( empty( $name ) || empty( $email ) || empty( $message ) ) {
        wp_send_json_error( array( 'message' => __( 'Пожалуйста, заполните все обязательные поля.', 'dark-theme' ) ) );
    }

    if ( ! is_email( $email ) ) {
        wp_send_json_error( array( 'message' => __( 'Пожалуйста, введите корректный email.', 'dark-theme' ) ) );
    }

    $to      = get_option( 'admin_email' );
    $subject = sprintf( __( 'Новая заявка с сайта от %s', 'dark-theme' ), $name );
    $body    = sprintf(
        "Имя: %s\nEmail: %s\nТелефон: %s\n\nСообщение:\n%s",
        $name,
        $email,
        $phone ? $phone : 'Не указан',
        $message
    );
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $name . ' <' . $email . '>',
    );

    $sent = wp_mail( $to, $subject, $body, $headers );

    if ( $sent ) {
        wp_send_json_success( array( 'message' => __( 'Спасибо! Ваше сообщение отправлено.', 'dark-theme' ) ) );
    } else {
        wp_send_json_error( array( 'message' => __( 'Произошла ошибка. Пожалуйста, попробуйте позже.', 'dark-theme' ) ) );
    }
}
add_action( 'wp_ajax_dark_theme_contact', 'dark_theme_contact_form_handler' );
add_action( 'wp_ajax_nopriv_dark_theme_contact', 'dark_theme_contact_form_handler' );

/**
 * Custom walker for primary menu
 */
class Dark_Theme_Nav_Walker extends Walker_Nav_Menu {
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $output .= '<li' . $class_names . '>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target ) ? $item->target : '';
        $atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
        $atts['href']   = ! empty( $item->url ) ? $item->url : '';
        $atts['class']  = 'nav-link text-gray-300 hover:text-white transition-colors';

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        $item_output  = $args->before ?? '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= ( $args->link_before ?? '' ) . $title . ( $args->link_after ?? '' );
        $item_output .= '</a>';
        $item_output .= $args->after ?? '';

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

/**
 * Disable Gutenberg editor for front page
 */
function dark_theme_disable_gutenberg( $use_block_editor, $post ) {
    if ( $post && get_option( 'page_on_front' ) == $post->ID ) {
        return false;
    }
    return $use_block_editor;
}
add_filter( 'use_block_editor_for_post', 'dark_theme_disable_gutenberg', 10, 2 );

/**
 * Add body classes
 */
function dark_theme_body_classes( $classes ) {
    $classes[] = 'dark-theme';
    if ( is_front_page() ) {
        $classes[] = 'front-page';
    }
    return $classes;
}
add_filter( 'body_class', 'dark_theme_body_classes' );
