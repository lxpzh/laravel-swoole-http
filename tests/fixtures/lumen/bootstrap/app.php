<?php

$app = new Laravel\Lumen\Application(
    realpath(__DIR__ . '/../')
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    Illuminate\Foundation\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    Illuminate\Foundation\Console\Kernel::class
);

$app->register(HuangYi\Http\LumenServiceProvider::class);

$app->register(HuangYi\Http\Tests\Fixtures\Lumen\App\Providers\TestServiceProvider::class);

$app->configure('http');

if (property_exists($app, 'router')) {
    $app->router->group(['namespace' => 'App\Http\Controllers'], function ($app) {
        require __DIR__ . '/../routes/web.php';
    });
} else {
    $app->group(['namespace' => 'App\Http\Controllers'], function ($app) {
        require __DIR__ . '/../routes/web.php';
    });
}

return $app;
