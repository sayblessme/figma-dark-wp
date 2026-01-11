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
$label              = dark_theme_get_field( 'contact_label', 'СВЯЖИТЕСЬ С НАМИ' );
$title              = dark_theme_get_field( 'contact_title', 'Готовы начать проект?' );
$description        = dark_theme_get_field( 'contact_description', 'Расскажите нам о вашей идее, и мы поможем воплотить ее в жизнь' );
$telegram_link      = dark_theme_get_field( 'hero_telegram_link', 'https://t.me/your_telegram' );

/**
 * Get contact icon SVG
 */
function dark_theme_get_contact_icon( $icon_name ) {
    $icons = array(
        'calendar' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg>',
        'send' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"></path><path d="m21.854 2.147-10.94 10.939"></path></svg>',
        'mail' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>',
        'phone' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>',
        'map-pin' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg>',
        'send-small' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"></path><path d="m21.854 2.147-10.94 10.939"></path></svg>',
    );

    return isset( $icons[ $icon_name ] ) ? $icons[ $icon_name ] : $icons['mail'];
}
?>

<section id="contact" class="contact-section py-24 bg-zinc-900">
    <div class="contact-container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="section-header text-center max-w-3xl mx-auto mb-16">
            <span class="section-label text-blue-400 font-semibold">
                <?php echo esc_html( $label ); ?>
            </span>
            <h2 class="section-title mt-4 text-4xl lg:text-5xl font-bold text-white">
                <?php echo esc_html( $title ); ?>
            </h2>
            <p class="section-description mt-6 text-xl text-gray-400">
                <?php echo esc_html( $description ); ?>
            </p>
        </div>

        <div class="contact-grid grid lg:grid-cols-2 gap-12">
            <!-- Left Column - Contact Options -->
            <div class="contact-options space-y-8">
                <!-- Intro Text -->
                <div>
                    <h3 class="text-2xl font-semibold text-white mb-6">Как с нами связаться</h3>
                    <p class="text-gray-400 mb-8">Мы всегда рады обсудить новые проекты. Выберите удобный способ связи или заполните форму.</p>
                </div>

                <!-- Бесплатная консультация Button -->
                <button type="button" class="w-full flex items-center gap-4 p-6 bg-gradient-to-r from-green-600 to-emerald-600 rounded-xl hover:shadow-lg hover:shadow-green-600/20 transition-all group" data-action="scroll-to-contact">
                    <div class="w-14 h-14 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                        <?php echo dark_theme_get_contact_icon( 'calendar' ); ?>
                    </div>
                    <div class="text-left flex-1">
                        <h4 class="text-white font-semibold text-lg mb-1">Бесплатная консультация</h4>
                        <p class="text-white/80">30 минут обсуждения вашего проекта</p>
                    </div>
                </button>

                <!-- Telegram Button -->
                <a href="<?php echo esc_url( $telegram_link ); ?>" target="_blank" rel="noopener noreferrer" class="flex items-center gap-4 p-6 bg-gradient-to-r from-[#0088cc] to-[#0077b5] rounded-xl hover:shadow-lg hover:shadow-[#0088cc]/20 transition-all group">
                    <div class="w-14 h-14 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                        <?php echo dark_theme_get_contact_icon( 'send' ); ?>
                    </div>
                    <div>
                        <h4 class="text-white font-semibold text-lg mb-1">Напишите в Telegram</h4>
                        <p class="text-white/80">Самый быстрый способ связи</p>
                    </div>
                </a>

                <!-- Contact Info Cards -->
                <div class="space-y-4">
                    <!-- Email -->
                    <div class="flex items-start gap-4 p-6 bg-zinc-950 rounded-xl border border-zinc-800">
                        <div class="w-12 h-12 bg-blue-600/10 rounded-lg flex items-center justify-center flex-shrink-0 text-blue-400">
                            <?php echo dark_theme_get_contact_icon( 'mail' ); ?>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold mb-1">Email</h4>
                            <p class="text-gray-400">hello@silverrow.io</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-start gap-4 p-6 bg-zinc-950 rounded-xl border border-zinc-800">
                        <div class="w-12 h-12 bg-blue-600/10 rounded-lg flex items-center justify-center flex-shrink-0 text-blue-400">
                            <?php echo dark_theme_get_contact_icon( 'phone' ); ?>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold mb-1">Телефон</h4>
                            <p class="text-gray-400">+7 (495) 123-45-67</p>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="flex items-start gap-4 p-6 bg-zinc-950 rounded-xl border border-zinc-800">
                        <div class="w-12 h-12 bg-blue-600/10 rounded-lg flex items-center justify-center flex-shrink-0 text-blue-400">
                            <?php echo dark_theme_get_contact_icon( 'map-pin' ); ?>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold mb-1">Адрес</h4>
                            <p class="text-gray-400">Москва, Пресненская наб., 12<br>Башня «Федерация»</p>
                        </div>
                    </div>
                </div>

                <!-- Working Hours -->
                <div class="p-6 bg-gradient-to-br from-blue-600/10 to-cyan-600/10 rounded-xl border border-blue-500/20">
                    <h4 class="text-white font-semibold mb-3">Режим работы</h4>
                    <div class="space-y-2 text-gray-400">
                        <div class="flex justify-between">
                            <span>Понедельник - Пятница</span>
                            <span class="text-white">9:00 - 18:00</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Суббота</span>
                            <span class="text-white">10:00 - 16:00</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Воскресенье</span>
                            <span class="text-white">Выходной</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Contact Form -->
            <div class="bg-zinc-950 rounded-2xl p-8 border border-zinc-800">
                <form id="contact-form" class="space-y-6" method="post" novalidate>
                    <div>
                        <label for="contact-name" class="block text-white font-semibold mb-2">Ваше имя</label>
                        <input
                            type="text"
                            id="contact-name"
                            name="name"
                            required
                            class="w-full px-4 py-3 bg-zinc-900 border border-zinc-800 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 transition-colors"
                            placeholder="Иван Иванов"
                        >
                    </div>

                    <div>
                        <label for="contact-email" class="block text-white font-semibold mb-2">Email</label>
                        <input
                            type="email"
                            id="contact-email"
                            name="email"
                            required
                            class="w-full px-4 py-3 bg-zinc-900 border border-zinc-800 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 transition-colors"
                            placeholder="ivan@example.com"
                        >
                    </div>

                    <div>
                        <label for="contact-phone" class="block text-white font-semibold mb-2">Телефон</label>
                        <input
                            type="tel"
                            id="contact-phone"
                            name="phone"
                            class="w-full px-4 py-3 bg-zinc-900 border border-zinc-800 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 transition-colors"
                            placeholder="+7 (999) 123-45-67"
                        >
                    </div>

                    <div>
                        <label for="contact-message" class="block text-white font-semibold mb-2">Сообщение</label>
                        <textarea
                            id="contact-message"
                            name="message"
                            required
                            rows="5"
                            class="w-full px-4 py-3 bg-zinc-900 border border-zinc-800 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 transition-colors resize-none"
                            placeholder="Расскажите о вашем проекте..."
                        ></textarea>
                    </div>

                    <div class="form-message hidden mb-6 p-4 rounded-lg" aria-live="polite"></div>

                    <button type="submit" class="form-submit w-full px-8 py-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center gap-2 font-semibold">
                        <span class="submit-text">Отправить сообщение</span>
                        <span class="submit-loading hidden">
                            <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                        <span class="submit-icon"><?php echo dark_theme_get_contact_icon( 'send-small' ); ?></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
