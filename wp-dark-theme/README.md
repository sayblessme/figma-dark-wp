# Dark Theme - Silver Row

WordPress тема для сайта студии мобильной разработки, созданная по дизайну из Figma.

![Theme Preview](wp-content/themes/dark-theme/screenshot.png)

## Описание

Кастомная WordPress тема с dark дизайном для лендинга студии мобильной разработки. Включает все секции из оригинального макета Figma:

- **Header** - фиксированная шапка с логотипом, навигацией и CTA кнопкой
- **Hero** - главный экран с заголовком, описанием, статистикой и изображением
- **Services** - секция услуг с карточками и статистикой
- **Portfolio** - портфолио проектов с изображениями и технологиями
- **Contact** - форма обратной связи и контактная информация
- **Footer** - подвал с навигацией и соц. сетями

## Требования

- WordPress 6.0+
- PHP 8.1+
- MySQL 5.7+ / MariaDB 10.3+
- Advanced Custom Fields (бесплатная версия)

## Установка

### 1. Установка WordPress

```bash
# Скачайте WordPress
wget https://wordpress.org/latest.tar.gz
tar -xzf latest.tar.gz

# Или через WP-CLI
wp core download --locale=ru_RU
```

### 2. Установка темы

```bash
# Скопируйте папку темы
cp -r wp-dark-theme/wp-content/themes/dark-theme /path/to/wordpress/wp-content/themes/

# Или склонируйте репозиторий в папку themes
cd /path/to/wordpress/wp-content/themes/
git clone https://github.com/sablethe/figma-dark-wp.git
mv figma-dark-wp/wp-dark-theme/wp-content/themes/dark-theme ./
```

### 3. Установка плагинов (ТОЛЬКО бесплатные)

1. Войдите в админку WordPress
2. Перейдите в **Плагины → Добавить новый**
3. Найдите и установите:
   - **Advanced Custom Fields** (автор: WP Engine)

### 4. Активация темы

1. Перейдите в **Внешний вид → Темы**
2. Найдите тему **Dark Theme - Silver Row**
3. Нажмите **Активировать**

### 5. Настройка сайта

#### Создание главной страницы

1. Перейдите в **Страницы → Добавить новую**
2. Введите название: "Главная"
3. Нажмите **Опубликовать**
4. Перейдите в **Настройки → Чтение**
5. Выберите **Статическая страница**
6. В поле **Главная страница** выберите "Главная"
7. Сохраните изменения

#### Настройка меню

1. Перейдите в **Внешний вид → Меню**
2. Создайте новое меню "Primary Menu"
3. Добавьте произвольные ссылки:
   - Услуги → `#services`
   - Портфолио → `#portfolio`
   - Контакты → `#contact`
4. Назначьте меню в область **Primary Menu**
5. Сохраните меню

## Настройка контента (ACF)

Весь контент сайта редактируется через **Theme Settings** в админке.

### Где редактировать контент

1. В админке WordPress найдите пункт **Theme Settings** (слева в меню)
2. Все поля разделены по секциям:

#### Header Settings
- `Logo Text (First Part)` - первая часть логотипа (Silver)
- `Logo Text (Accent Part)` - акцентная часть логотипа (Row)
- `Header Button Text` - текст кнопки в шапке

#### Hero Section
- `Badge Text` - текст бейджа ("Разработка мобильных приложений")
- `Title (First Line)` - первая строка заголовка
- `Title (Gradient Line)` - градиентная строка заголовка
- `Description` - описание под заголовком
- `Primary Button Text` - текст основной кнопки
- `Secondary Button Text` - текст вторичной кнопки
- `Telegram Link` - ссылка на Telegram
- `Hero Image` - изображение справа
- `Statistics` (repeater) - блоки статистики (число + подпись)

#### Services Section
- `Section Label` - метка секции (НАШИ УСЛУГИ)
- `Section Title` - заголовок секции
- `Section Description` - описание секции
- `Services` (repeater) - карточки услуг:
  - `Icon` - название иконки (smartphone, code, sparkles, zap, shield, trending-up)
  - `Title` - название услуги
  - `Description` - описание услуги
- `Statistics Cards` (repeater) - карточки статистики:
  - `Number` - число
  - `Label` - подпись
  - `Description` - описание
  - `Color Theme` - цветовая схема (blue/purple/green)

#### Portfolio Section
- `Section Label` - метка секции
- `Section Title` - заголовок
- `Section Description` - описание
- `Portfolio Items` (repeater) - проекты:
  - `Image` - изображение проекта
  - `Category` - категория
  - `Title` - название проекта
  - `Description` - описание
  - `Rating` - рейтинг
  - `Downloads` - количество загрузок
  - `Technologies` - технологии (через запятую)
  - `Link` - ссылка на проект

#### Contact Section
- `Section Label` - метка секции
- `Section Title` - заголовок
- `Section Description` - описание
- `Contact Information` (repeater) - контактные данные:
  - `Icon` - иконка (mail, phone, map-pin, clock)
  - `Label` - подпись
  - `Value` - значение
  - `Link` - ссылка (опционально)
- Плейсхолдеры формы
- Текст кнопки отправки

#### Footer Section
- `Footer Description` - описание в футере
- `Copyright Text` - текст копирайта
- `Social Links` (repeater) - соц. сети:
  - `Platform` - платформа (telegram, whatsapp, instagram, linkedin, github)
  - `URL` - ссылка

## Структура файлов темы

```
dark-theme/
├── acf-json/              # ACF JSON для синхронизации полей
├── assets/
│   ├── css/
│   │   └── main.css       # Основные стили
│   ├── js/
│   │   └── main.js        # JavaScript функционал
│   ├── fonts/             # Кастомные шрифты (если нужны)
│   └── images/            # Изображения темы
├── template-parts/
│   ├── section-hero.php       # Hero секция
│   ├── section-services.php   # Services секция
│   ├── section-portfolio.php  # Portfolio секция
│   └── section-contact.php    # Contact секция
├── style.css              # Мета-информация темы
├── functions.php          # Функции и ACF поля
├── header.php             # Шапка сайта
├── footer.php             # Подвал сайта
├── front-page.php         # Главная страница
├── page.php               # Шаблон страницы
├── single.php             # Шаблон записи
├── index.php              # Архив записей
├── 404.php                # Страница 404
└── screenshot.png         # Превью темы
```

## Цветовая палитра

```css
/* Основные цвета */
--color-zinc-950: #09090b;     /* Основной фон */
--color-zinc-900: #18181b;     /* Вторичный фон */
--color-zinc-800: #27272a;     /* Границы */
--color-blue-600: #2563eb;     /* Primary */
--color-blue-700: #1d4ed8;     /* Primary hover */
--color-blue-400: #60a5fa;     /* Акцент */
--color-cyan-400: #22d3ee;     /* Градиент */
--color-gray-400: #a1a1aa;     /* Текст muted */

/* Бренды */
--color-telegram: #0088cc;
--color-whatsapp: #25d366;
```

## Адаптивность

Тема полностью адаптивна для всех устройств:

- **Desktop**: ≥1024px - полный layout
- **Tablet**: 768px - 1023px - адаптированная сетка
- **Mobile**: ≤767px - мобильная версия, бургер-меню

## Безопасность

Тема следует лучшим практикам безопасности WordPress:

- Все выводимые данные экранируются (`esc_html`, `esc_attr`, `esc_url`)
- Nonce проверка для AJAX запросов
- Санитизация входных данных (`sanitize_text_field`, `sanitize_email`)
- Защита от прямого доступа к файлам

## Кастомизация

### Изменение цветов

Отредактируйте CSS переменные в `assets/css/main.css`:

```css
:root {
    --color-primary: #2563eb;
    --color-primary-hover: #1d4ed8;
    /* ... */
}
```

### Добавление новых иконок

В файлах `section-services.php` и `section-contact.php` есть функции для получения SVG иконок. Добавьте новые иконки в соответствующие массивы.

### Добавление новых секций

1. Создайте файл `template-parts/section-{name}.php`
2. Добавьте ACF группу полей в `functions.php`
3. Подключите секцию в `front-page.php`:
   ```php
   get_template_part( 'template-parts/section', 'name' );
   ```

## FAQ

**Q: Где взять изображения для портфолио?**
A: Загрузите изображения через медиабиблиотеку WordPress и выберите их в ACF полях.

**Q: Как изменить контактную форму?**
A: Форма работает через AJAX. Для подключения сторонних сервисов отредактируйте функцию `dark_theme_contact_form_handler()` в `functions.php`.

**Q: Как добавить дополнительные страницы?**
A: Создайте страницы в WordPress. Они будут использовать шаблон `page.php`.

## Лицензия

GPL v2 or later

## Автор

Создано по дизайну Figma Dark Theme Website Clone.

---

При возникновении вопросов создавайте Issue в репозитории.
