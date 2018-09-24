<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', '2masternodes-blog');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'CY@^=x:Zswm=4>Zb<e>2rJ 2Pqv[E/;DZ}wk;gPDQ)YOnL+ud|^?}PG<%Q=+@gLf');
define('SECURE_AUTH_KEY',  '7[w7u,Pi>#IpJS:Yr*{~_M)WZDM9>LPp6a/q7 pE%z|J.Y];_r}2c;,]~#&RdFG)');
define('LOGGED_IN_KEY',    '3Asv/u,6yK)qcu9(;:{e$O~}Ny,3I~2MDP`tMx$R$RHTBb=X/t$<rXe[#OLlrM~@');
define('NONCE_KEY',        '::EPOH45lm+NMg%7TH#yq.s!3]D*%KA66k!/H7X^GG%G?C~iE(F;%<ECN(Sl]HB!');
define('AUTH_SALT',        'QyuNLJ%KgC[{SD=a</2TSF:r{_~9%ZA_AE8-A}jS6r?!_}H.h1B8x2&FU%0Gd8@N');
define('SECURE_AUTH_SALT', 'Djg8<|wX<).b=LFp(4~&0J{=z<g$J[5(*+{+lD|zkoSef<5z#w3#)*zJa.5e3$Z5');
define('LOGGED_IN_SALT',   ']mUch7Pq,32J8E54CSR$qldKTbr:pKDFHU,qY[P R(~]hs:lee9>-r!bel!1S~yH');
define('NONCE_SALT',       'Q:/BLvSzl-/_N|snI<Tw&@(PjH@+2lU<S+HqB<aS{(,r<l># qQ}P9)eh6J}^aWV');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
