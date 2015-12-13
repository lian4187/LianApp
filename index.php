<?php

// 预定义常量
define('BASE_DIR', __DIR__);
define('BASE_NAMESPACE', 'LianApp');

// class loader 类
include BASE_DIR . '/Lian/Loader.php';

// 注册 class loader 类
spl_autoload_register('LianApp\\Lian\\Loader::autoload');

// 初始化
$dbProxy = new LianApp\Lian\Base\Dao\DB\Proxy(new LianApp\Lian\Base\Dao\DB\PDO());
$dbProxy->connect(
    LianApp\Lian\Configure::DB_USERNAME,
    LianApp\Lian\Configure::DB_PASSWORD,
    LianApp\Lian\Configure::DB_HOST,
    LianApp\Lian\Configure::DB_PORT);
LianApp\Lian\Base\Common\Register::set('dbProxy', $dbProxy);


// 业务逻辑
LianApp\App\Controller\Home\Index::index();
