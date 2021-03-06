<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => '/api'], function () use ($router) {
    $router->get('/all', 'AllController@all');
    $router->get('/slow', 'AllController@slow');

    $router->group(['prefix' => '/flux-total-nat'], function () use ($router) {
        $router->get('/', 'FluxTotalNatController@all');
        $router->post('/', 'FluxTotalNatController@store');

        $router->group(['prefix' => '{fluxTotalNatID}'], function () use ($router) {
            $router->get('/', 'FluxTotalNatController@get');
            $router->patch('/', 'FluxTotalNatController@update');
            $router->delete('/', 'FluxTotalNatController@destroy');
        });
    });

    $router->group(['prefix' => '/allocations-vs-rdv'], function () use ($router) {
        $router->get('/', 'AllocationsVsRdvController@all');
        $router->post('/', 'FluxTotalNatController@store');

        $router->group(['prefix' => '{allocationVsRdvID}'], function () use ($router) {
            $router->get('/', 'AllocationsVsRdvController@get');
            $router->patch('/', 'AllocationsVsRdvController@update');
            $router->delete('/', 'AllocationsVsRdvController@destroy');
        });
    });

    $router->group(['prefix' => '/stocks-plateformes', 'middleware' => 'admin'], function () use ($router) {
        $router->get('/', 'StocksPlateformesController@all');
        $router->post('/', 'StocksPlateformesController@store');

        $router->group(['prefix' => '{stockPlateformeID}'], function () use ($router) {
            $router->get('/', 'StocksPlateformesController@get');
            $router->patch('/', 'AllocationsVsRdvController@update');
            $router->delete('/', 'StocksPlateformesController@destroy');
        });
    });
});

$router->get('/auth', 'AuthController@auth');

$router->group(['prefix' => '/front'], function () use ($router) {
    $router->get('/', 'DefaultController@index');
    $router->get('/all', 'DefaultController@all');
    $router->get('/slow', 'DefaultController@slow');
});
