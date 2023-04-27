<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('documentation', ['middleware' => ['auth.api.doc'], function () {
    return view()->file('..' . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'apidoc' . DIRECTORY_SEPARATOR . 'index.blade.php');
}]);

$router->options('clientreport', function () {
    return response('', 200);
});
$router->options('clientreportchart', function () {
    return response('', 200);
});
$router->options('dynamic-chart', function () {
    return response('', 200);
});
$router->options('dashboard-table', function () {
    return response('', 200);
});
$router->options('accountslist', function () {
    return response('', 200);
});
$router->options('account-enable', function () {
    return response('', 200);
});
$router->options('account-disable', function () {
    return response('', 200);
});
$router->options('account-delete', function () {
    return response('', 200);
});
$router->options('accountadd', function () {
    return response('', 200);
});
$router->options('subbulistget', function () {
    return response('', 200);
});
$router->options('vendorslistget', function () {
    return response('', 200);
});
$router->options('accountedit', function () {
    return response('', 200);
});
$router->options('accountget', function () {
    return response('', 200);
});
$router->options('year-list', function () {
    return response('', 200);
});
$router->options('sso-login', function () {
    return response('', 200);
});
$router->options('check-token', function () {
    return response('', 200);
});
$router->options('auth/login', function () {
    return response('', 200);
});
$router->options('/', function () {
    return response('', 200);
});

$router->options('/services', function () {
    return response('', 200);
});

$router->options('/vendors', function () {
    return response('', 200);
});

$router->options('/accounts', function () {
    return response('', 200);
});

$router->options('resources', function () {
    return response('', 200);
});

$router->options('business-units', function () {
    return response('', 200);
});
$router->options('business-units/create', function () {
    return response('', 200);
});
$router->options('business-units/{id:\d+}', function () {
    return response('', 200);
});

$router->options('sub-business-units', function () {
    return response('', 200);
});
$router->options('sub-business-units/{id:\d+}', function () {
    return response('', 200);
});

$router->options('clients', function () {
    return response('', 200);
});
$router->options('clients/{id:\d+}', function () {
    return response('', 200);
});
$router->options('power-bi/embed-token/{report_id}/{group_id}', function () {
    return response('', 200);
});
$router->options('power-bi/reports', function () {
    return response('', 200);
});
$router->options('/notifications', function () {
    return response('', 200);
});
$router->options('/demo', function () {
    return response('', 200);
});
$router->options('/notifications/{UserID:\d+}', function () {
    return response('', 200);
});
$router->options('notifications/{UserID:\d+}', function () {
    return response('', 200);
});
$router->options('notifications/update', function () {
    return response('', 200);
});
$router->options('/alerts', function () {
    return response('', 200);
});
$router->options('/alerts/export', function () {
    return response('', 200);
});
$router->options('/alerts/services', function () {
    return response('', 200);
});
$router->options('/alerts/{id:\d+}', function () {
    return response('', 200);
});
$router->options('/alerts/suspend', function () {
    return response('', 200);
});
$router->options('/alerts/unsuspend', function () {
    return response('', 200);
});
$router->options('/alerts/types-descriptions', function () {
    return response('', 200);
});

$router->options('/frequencies/by-alert-type', function () {
    return response('', 200);
});

$router->options('/alert-types', function () {
    return response('', 200);
});

$router->options('/owners', function () {
    return response('', 200);
});

$router->options('/sources', function () {
    return response('', 200);
});

$router->options('/products', function () {
    return response('', 200);
});

$router->options('/comparison-types', function () {
    return response('', 200);
});

$router->options('/tags', function () {
    return response('', 200);
});
$router->options('/tags/by-tag-key', function () {
    return response('', 200);
});
$router->options('alerts-handled', function () {
    return response('', 200);
});
$router->options('alerts-statuses', function () {
    return response('', 200);
});
$router->options('alerts-statuses/{alertId:\d+}', function () {
    return response('', 200);
});
$router->options('statuses-reasons', function () {
    return response('', 200);
});

$router->options('azure-account/{clientId:\d+}', function () {
    return response('', 200);
});
$router->options('azure-account/app/{clientId:\d+}', function () {
    return response('', 200);
});
$router->options('azure-account/app/{clientId:\d+}/upload', function () {
    return response('', 200);
});

$router->get('/', function () {
    return response(env('TOKEN_LIFETIME'), 200);
});
$router->post('sso-login', ['uses' => 'AuthController@ssoLogin']);
$router->post('check-token', ['uses' => 'AuthController@checkToken']);
$router->group(['middleware' => 'auth.bearer'], function () use ($router) {
    $router->get('subbulistget', ['uses' => 'BusinessUnitController@subUnit']);
    $router->get('vendorslistget', ['uses' => 'BusinessUnitController@vendorsList']);
});

$router->group(['middleware' => 'auth.bearer'], function () use ($router) {
    $router->post('clientreport', ['uses' => 'DashboardController@grid']);
    $router->get('year-list', ['uses' => 'DashboardController@year']);
    $router->get('demo', ['uses' => 'DashboardController@year']);

    $router->post('clientreportchart', ['uses' => 'DashboardController@chart']);
    $router->post('dynamic-chart', ['uses' => 'DashboardController@dynamicChart']);
    $router->post('dashboard-table', ['uses' => 'DashboardController@dashboardTable']);
    $router->post('accountslist', ['uses' => 'ClientController@accountList']);
    $router->post('account-enable', ['uses' => 'ClientController@accountEnable']);
    $router->post('account-disable', ['uses' => 'ClientController@accountDisable']);
    $router->post('account-delete', ['uses' => 'ClientController@accountDelete']);
    $router->post('accountadd', ['uses' => 'ClientController@addAccount']);
    $router->put('accountedit', ['uses' => 'ClientController@updateAccount']);
    $router->get('accountget', ['uses' => 'ClientController@getAccount']);

    $router->get('services', ['uses' => 'ServiceController@serviceList']);

    $router->get('vendors', ['uses' => 'VendorController@vendorList']);

    $router->get('accounts', ['uses' => 'AccountController@accountListDynamicDashboard']);

    $router->group(['prefix' => 'clients'], function () use ($router) {
        $router->get('/', ['uses' => 'ClientController@list']);
        $router->get('/{id:\d+}', ['uses' => 'ClientController@get']);
        $router->post('/', ['uses' => 'ClientController@create']);
        $router->put('/{id:\d+}', ['uses' => 'ClientController@update']);
        $router->delete('/{id:\d+}', ['uses' => 'ClientController@delete']);
    });

    $router->group(['prefix' => 'business-units'], function () use ($router) {
        $router->post('/', ['uses' => 'BusinessUnitController@unit']);
        $router->post('/create', ['uses' => 'BusinessUnitController@create']);
        $router->put('/{id:\d+}', ['uses' => 'BusinessUnitController@update']);
        $router->delete('/{id:\d+}', ['uses' => 'BusinessUnitController@delete']);
    });

    $router->group(['prefix' => 'sub-business-units'], function () use ($router) {
        $router->post('/', ['uses' => 'SubBusinessUnitController@create']);
        $router->put('/{id:\d+}', ['uses' => 'SubBusinessUnitController@update']);
        $router->delete('/{id:\d+}', ['uses' => 'SubBusinessUnitController@delete']);
    });

    $router->group(['prefix' => 'power-bi'], function () use ($router) {
        $router->get('/embed-token/{report_id}/{group_id}', ['uses' => 'PowerBIController@getReportEmbedToken']);
        $router->get('/reports', ['uses' => 'PowerBIController@reportList']);
    });
    $router->group(['prefix' => 'notifications'], function () use ($router) {
        $router->get('', ['uses' => 'NotificationController@all']);
        $router->get('{UserID:\d+}', ['uses' => 'NotificationController@ntfList']);
        $router->put('update', ['uses' => 'NotificationController@update']);
        $router->post('', ['uses' => 'NotificationController@create']);
        $router->delete('/{id:\d+}', ['uses' => 'NotificationController@delete']);
    });

    $router->group(['prefix' => 'alerts'], function () use ($router) {
        $router->get('', ['uses' => 'AlertController@all']);
        $router->post('/export', ['uses' => 'AlertController@export']);
        $router->get('/services', ['uses' => 'AlertController@showServiceList']);
        $router->post('', ['uses' => 'AlertController@create']);
        $router->post('/suspend', ['uses' => 'AlertController@suspend']);
        $router->post('/unsuspend', ['uses' => 'AlertController@unSuspend']);
        $router->delete('/{id:\d+}', ['uses' => 'AlertController@delete']);
        $router->get('/types-descriptions', ['uses' => 'AlertController@showTypesDescriptions']);
    });
    

    $router->group(['prefix' => 'alert-types'], function () use ($router) {
        $router->get('', ['uses' => 'AlertTypeController@all']);
    });

    $router->group(['prefix' => 'owners'], function () use ($router) {
        $router->get('', ['uses' => 'OwnerController@all']);
    });

    $router->group(['prefix' => 'comparison-types'], function () use ($router) {
        $router->get('', ['uses' => 'ComparisonTypeController@all']);
    });

    $router->group(['prefix' => 'products'], function () use ($router) {
        $router->get('', ['uses' => 'ProductController@all']);
    });

    $router->group(['prefix' => 'sources'], function () use ($router) {
        $router->get('', ['uses' => 'SourceController@all']);
    });

    $router->group(['prefix' => 'resources'], function () use ($router) {
        $router->get('', ['uses' => 'ClientController@resources']);
    });

    $router->group(['prefix' => 'tags'], function () use ($router) {
        $router->get('', ['uses' => 'TagController@all']);
        $router->post('by-tag-key', ['uses' => 'TagController@readByTagKey']);
    });

    $router->group(['prefix' => 'frequencies'], function () use ($router) {
        $router->get('by-alert-type', ['uses' => 'FrequencyController@listByAlertTypeId']);
    });

    // AlertHandle
    $router->group(['prefix' => 'alerts-handled'], function () use ($router) {
        $router->get('', ['uses' => 'AlertHandleController@readList']);
    });

    // AlertStatus
    $router->group(['prefix' => 'alerts-statuses'], function () use ($router) {
        $router->get('', ['uses' => 'AlertStatusController@readList']);
        $router->put('{alertId:\d+}', ['uses' => 'AlertStatusController@update']);
    });

    // StatusReason
    $router->group(['prefix' => 'statuses-reasons'], function () use ($router) {
        $router->get('', ['uses' => 'StatusReasonController@readList']);
    });

    // Azure Integration Management
    $router->group(['prefix' => 'azure-account', 'middleware' => ['access.by.client.id']], function () use ($router) {
        $router->get('{clientId:\d+}', ['uses' => 'AzureAccountController@view']);
        $router->post('{clientId:\d+}', ['uses' => 'AzureAccountController@store']);
        $router->get('app/{clientId:\d+}', ['uses' => 'AzureAccountController@appList']);
        $router->post('app/{clientId:\d+}/upload', ['uses' => 'AzureAccountController@appUpload']);
    });

});

$router->group(['prefix' => 'auth'], function () use ($router) {
    $router->post('login', ['uses' => 'AuthController@login']);
    $router->post('saml-login', ['uses' => 'AuthController@samlLogin']);
    $router->get('saml-login', function () {return response('', 200);});
    $router->post('azur-login', ['uses' => 'AuthController@azurLogin']);
    $router->get('azur-login', ['uses' => 'AuthController@azurGetLogin']);
});



