<?php

use App\Console\Kernel;
use App\Exceptions\Handler;
use App\Providers\AlertServiceProvider;
use App\Providers\NotificationServiceProvider;
use App\Providers\AlertTypeServiceProvider;
use App\Providers\AuthServiceProvider;
use App\Providers\BusinessUnitProvider;
use App\Providers\ClientServiceProvider;
use App\Providers\CommandBusProvider;
use App\Providers\ComparisonTypeServiceProvider;
use App\Providers\DashboardServiceProvider;
use App\Providers\FrequencyServiceProvider;
use App\Providers\OwnerServiceProvider;
use App\Providers\ProductServiceProvider;
use App\Providers\ServiceProvider;
use App\Providers\SourceServiceProvider;
use App\Providers\SubBusinessUnitServiceProvider;
use App\Providers\TagServiceProvider;
use App\Providers\UserServiceProvider;
use App\Providers\ValidationServiceProvider;
use App\Providers\VendorServiceProvider;
use Illuminate\Contracts\Console\Kernel as ConsoleKernel;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Laravel\Lumen\Application;
use Urameshibr\Providers\FormRequestServiceProvider;

require_once __DIR__.'/../vendor/autoload.php';

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    dirname(__DIR__)
))->bootstrap();

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Application(dirname(__DIR__));

$app->withFacades();
$app->withEloquent();

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/

$app->singleton(ExceptionHandler::class, Handler::class);
$app->singleton(ConsoleKernel::class, Kernel::class);

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/

$app->routeMiddleware([
    'auth.bearer' => App\Http\Middleware\AuthBearer::class,
    'auth.api.doc' => App\Http\Middleware\AuthApiDoc::class,
    'access.by.client.id' => App\Http\Middleware\Permission\AccessByClientId::class,
]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

$app->register(AuthServiceProvider::class);
$app->register(CommandBusProvider::class);
$app->register(UserServiceProvider::class);
$app->register(DashboardServiceProvider::class);
$app->register(ClientServiceProvider::class);
$app->register(BusinessUnitProvider::class);
$app->register(FormRequestServiceProvider::class);
$app->register(ValidationServiceProvider::class);
$app->register(SubBusinessUnitServiceProvider::class);
$app->register(ServiceProvider::class);
$app->register(VendorServiceProvider::class);
$app->register(AlertServiceProvider::class);
$app->register(NotificationServiceProvider::class);
$app->register(AlertTypeServiceProvider::class);
$app->register(OwnerServiceProvider::class);
$app->register(ComparisonTypeServiceProvider::class);
$app->register(ProductServiceProvider::class);
$app->register(SourceServiceProvider::class);
$app->register(TagServiceProvider::class);
$app->register(FrequencyServiceProvider::class);
$app->register(\Mpociot\ApiDoc\ApiDocGeneratorServiceProvider::class);

$app->configure('apidoc');

/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

$app->router->group([
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    require __DIR__.'/../routes/web.php';
});

return $app;
