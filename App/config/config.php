<?php

/**
 * Domain
 */
define('PATH', 'http://stickers');


/**
 * DB CONNECTION
 * DB USER
 * DB PASSWORD
 *
 */
define('DB_CONN', 'mysql:dbname=stickers;host=localhost');
define('DB_USER', 'root');
define('DB_PASS', '');


//base dir
define('APP_BASEDIR', __DIR__.'/../../');

// I am
define('RO', 'Игошин Роман Александрович');

require_once __DIR__.'/helpers.php';

require_once __DIR__.'../../bootstrap/autoload.php';

require_once __DIR__.'../../Framework/database.php';

require_once __DIR__.'/routing.php';

