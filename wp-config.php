<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'slava' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'slava' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'PavelDiver1' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ue-w!GERzl?2[kp:k4Ow~ws&QnxdcCZ KOAEa57O:]Edh%$E0<OIb5fhz)%7:8#R' );
define( 'SECURE_AUTH_KEY',  '%KsyOoyjh?GC{S*M@>0sg#,45e89~}iXcMXWTH^U7iJiVKZ!AXfLfEc`s[^/eh@r' );
define( 'LOGGED_IN_KEY',    'R)5oHD1 !(8*Hnri1DtP[o72P?D6x5*1vp+[N--4Zou|o9j^6{g,1F2NqN[&FJ>c' );
define( 'NONCE_KEY',        '{PKesWYj3^:3E|[~gZ8lDy s<Q{7b_~N7S.+stJ[*Ofz[]UkKiR{)bNN3lt5CC7b' );
define( 'AUTH_SALT',        '5|G+`tg[j)kT6xJj^nx4sk`xhdJ}k35kq,#SNtFM:A1K]WopzF2)sVomO,Xn>&Vu' );
define( 'SECURE_AUTH_SALT', '`PoD5Zt<Om(;%)1KwOpx$cUlVLwt~UYIg;amnz$$S(.ZaxV8W@}rnmZ:hQASVkNt' );
define( 'LOGGED_IN_SALT',   'dYFsh`Z}jQB^R4O3c(s6eh;RI`95=7bjyGUp$i@I{!hprawj>=xSMG#/h7?OZ@,Z' );
define( 'NONCE_SALT',       'S^p)Y|ay#27|qa*=U#m|N||f=57}EOJkfSi/~G <EJ|#nh@Zkh.Nz2sO,Tn>3^Q?' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
