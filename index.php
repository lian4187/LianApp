<?php

// 预定义常量
define('BASE_DIR', __DIR__);
define('BASE_NAMESPACE', 'LianApp');

// class loader 类
include BASE_DIR . '/Lian/Loader.php';

// 注册 class loader 类
spl_autoload_register('LianApp\\Lian\\Loader::autoload');


// 业务逻辑
LianApp\App\Controller\Home\Index::test();
