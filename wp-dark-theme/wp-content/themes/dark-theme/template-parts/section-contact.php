<?php
/**
 * Contact Section Template
 *
 * @package Dark_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get ACF fields with defaults
$label              = dark_theme_get_field( 'contact_label', 'КОНТАКТЫ' );
$title              = dark_theme_get_field( 'contact_title', 'Давайте обсудим ваш проект' );
$description        = dark_theme_get_field( 'contact_description', 'Оставьте заявку и мы свяжемся с вами в течение 24 часов' );
$contact_info       = dark_theme_get_field( 'contact_info', array() );
$name_placeholder   = dark_theme_get_field( 'form_name_placeholder', 'Ваше имя' );
$email_placeholder  = dark_theme_get_field( 'form_email_placeholder', 'Email' );
$message_placeholder = dark_theme_get_field( 'form_message_placeholder', 'Расскажите о вашем проекте' );
$button_text        = dark_theme_get_field( 'form_button_text', 'Отправить заявку' );

// Default contact info if not set
if ( empty( $contact_info ) ) {
    $contact_info = array(
        array(
            'icon' => 'mail',
            'label' => 'Email',
            'value' => 'hello@silverrow.com',
            'link' => 'mailto:hello@silverrow.com',
        ),
        array(
            'icon' => 'phone',
            'label' => 'Телефон',
            'value' => '+7 (999) 123-45-67',
            'link' => 'tel:+79991234567',
        ),
        array(
            'icon' => 'map-pin',
            'label' => 'Адрес',
            'value' => 'Москва, Россия',
            'link' => '',
        ),
        array(
            'icon' => 'clock',
            'label' => 'Режим работы',
            'value' => 'Пн-Пт: 10:00 - 19:00',
            'link' => '',
        ),
    );
}

/**
 * Get contact icon SVG
 */
function dark_theme_get_contact_icon( $icon_name ) {
    $icons = array(
        'mail' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>',
        'phone' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>',
        'map-pin' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg>',
        'clock' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>',
    );

    return isset( $icons[ $icon_name ] ) ? $icons[ $icon_name ] : $icons['mail'];
}
?>

<section id="contact" class="contact-section py-24 bg-zinc-950">
    <div class="contact-container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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

        <div class="contact-grid grid lg:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div class="contact-info">
                <div class="contact-info-grid grid sm:grid-cols-2 gap-6">
                    <?php foreach ( $contact_info as $info ) : ?>
                    <div class="contact-info-card p-6 bg-zinc-900 rounded-2xl border border-zinc-800">
                        <div class="contact-icon w-12 h-12 bg-blue-600/10 rounded-xl flex items-center justify-center mb-4 text-blue-400">
                            <?php echo dark_theme_get_contact_icon( $info['icon'] ); ?>
                        </div>
                        <div class="contact-label text-sm text-gray-400 mb-1">
                            <?php echo esc_html( $info['label'] ); ?>
                        </div>
                        <?php if ( ! empty( $info['link'] ) ) : ?>
                        <a href="<?php echo esc_url( $info['link'] ); ?>" class="contact-value text-white font-medium hover:text-blue-400 transition-colors">
                            <?php echo esc_html( $info['value'] ); ?>
                        </a>
                        <?php else : ?>
                        <div class="contact-value text-white font-medium">
                            <?php echo esc_html( $info['value'] ); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Map or Additional Info -->
                <div class="contact-additional mt-8 p-8 bg-gradient-to-br from-blue-600/10 to-cyan-600/10 rounded-2xl border border-blue-500/20">
                    <h3 class="text-xl font-semibold text-white mb-4">Готовы начать проект?</h3>
                    <p class="text-gray-400 mb-6">
                        Мы всегда рады новым вызовам и интересным проектам. Расскажите нам о вашей идее, и мы поможем воплотить её в жизнь.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="https://t.me/your_telegram" target="_blank" rel="noopener noreferrer" class="btn btn-telegram inline-flex items-center gap-2 px-6 py-3 bg-telegram text-white rounded-lg hover:bg-telegram-hover transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"></path>
                                <path d="m21.854 2.147-10.94 10.939"></path>
                            </svg>
                            Telegram
                        </a>
                        <a href="https://wa.me/79991234567" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp inline-flex items-center gap-2 px-6 py-3 bg-whatsapp text-white rounded-lg hover:bg-whatsapp-hover transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 21l1.65-3.8a9 9 0 1 1 3.4 2.9L3 21"></path>
                            </svg>
                            WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form-wrapper">
                <form id="contact-form" class="contact-form p-8 bg-zinc-900 rounded-2xl border border-zinc-800" method="post" novalidate>
                    <div class="form-group mb-6">
                        <label for="contact-name" class="form-label block text-white font-medium mb-2">
                            <?php echo esc_html( $name_placeholder ); ?> <span class="text-red-400">*</span>
                        </label>
                        <input
                            type="text"
                            id="contact-name"
                            name="name"
                            class="form-input w-full px-4 py-3 bg-zinc-800 border border-zinc-700 rounded-lg text-white placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors"
                            placeholder="<?php echo esc_attr( $name_placeholder ); ?>"
                            required
                        >
                    </div>

                    <div class="form-group mb-6">
                        <label for="contact-email" class="form-label block text-white font-medium mb-2">
                            <?php echo esc_html( $email_placeholder ); ?> <span class="text-red-400">*</span>
                        </label>
                        <input
                            type="email"
                            id="contact-email"
                            name="email"
                            class="form-input w-full px-4 py-3 bg-zinc-800 border border-zinc-700 rounded-lg text-white placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors"
                            placeholder="<?php echo esc_attr( $email_placeholder ); ?>"
                            required
                        >
                    </div>

                    <div class="form-group mb-6">
                        <label for="contact-message" class="form-label block text-white font-medium mb-2">
                            Сообщение <span class="text-red-400">*</span>
                        </label>
                        <textarea
                            id="contact-message"
                            name="message"
                            rows="5"
                            class="form-textarea w-full px-4 py-3 bg-zinc-800 border border-zinc-700 rounded-lg text-white placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors resize-none"
                            placeholder="<?php echo esc_attr( $message_placeholder ); ?>"
                            required
                        ></textarea>
                    </div>

                    <div class="form-message hidden mb-6 p-4 rounded-lg" aria-live="polite"></div>

                    <button type="submit" class="form-submit w-full px-8 py-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center gap-2">
                        <span class="submit-text"><?php echo esc_html( $button_text ); ?></span>
                        <span class="submit-loading hidden">
                            <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="submit-icon">
                            <path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"></path>
                            <path d="m21.854 2.147-10.94 10.939"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
