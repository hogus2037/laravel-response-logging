- `composer require hogus/laravel-response-logging`
  
- `php artisan vendor:publish --provider="Hogus\LaravelResponseLogging\ResponseLoggingServiceProvider"
`
- 在路由中引入中间件 `middleware(Hogus\LaravelResponseLogging\Middleware\Report::class)`
- log文件目录 storage/response/*.log
