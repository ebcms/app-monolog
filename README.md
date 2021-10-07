# app-monolog

配置config/ebcms/monolog/handlers.php中配置日志分发器

例如：

``` php
return [
    new \Monolog\Handler\StreamHandler(\Ebcms\App::getInstance()->getAppPath() . '/runtime/log/' . date('Y-m/d') . '.log', \Monolog\Logger::DEBUG)
];
```

详情参考文档 [https://github.com/Seldaek/monolog](https://github.com/Seldaek/monolog)
