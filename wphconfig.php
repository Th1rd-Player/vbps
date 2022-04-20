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
 * * Настройки MySQL
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
define( 'DB_NAME', 'wordpress123' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'ka1N' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '123456!qwerty' );

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
define( 'AUTH_KEY',         'dc%3VqW}wtOK+iavn6[jqc2d8)wP<CbjtH_lCz%hY&TxvWRNhKF5HEw1-nH}|y&.' );
define( 'SECURE_AUTH_KEY',  '|/`rG_3FLZ%Q-[xX[wT.g9`P dMBmKKwQ<y!_Euo^5gtMDR)?X_jc`vGXkOgs]Xk' );
define( 'LOGGED_IN_KEY',    'rg( @rSKn%8a#okXzfl$`7<AF=WO FT,XF4I09<-<|d|xA;Dx#g0]X)5~$vffOjO' );
define( 'NONCE_KEY',        ',(M_om0e8{0}5)>KN;L]&^m5goEV5THgz;OO>&&m*:%B{I~+^U;Yy@BGvnM4Wp [' );
define( 'AUTH_SALT',        'Br!Zi7}hw,];!{5W&pj0RmH=Im5;F<>cMY0?XHTv CO7a{)3hB`iX(bd(+ky4jAn' );
define( 'SECURE_AUTH_SALT', '`!Ya;Mi2vV{mIETS/V2f@f$A(N l(!4nd7OkL-=$RO47#:/&g&Ps%Nwwt^6?E3T[' );
define( 'LOGGED_IN_SALT',   'D~-XW6LK=`(TiNTXi)@E.[>dP0ny+TF[(+FGaGAVP_#uO3_32W%pD~*o]_@E)QQR' );
define( 'NONCE_SALT',       'mod kA[1y(OE,6,TwCg);2G=#Y8eTI9g,}MkW&9^<jl7m* BG&{rq[V2N-^by]28' );

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
