<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => '/api'], function () use ($router) {
    $router->group(['prefix' => '/flux-total-nat'], function () use ($router) {
        $router->get('/', 'FluxTotalNatController@all');

        $router->group(['prefix' => '{fluxTotalNatID}'], function () use ($router) {
            $router->get('/', 'FluxTotalNatController@get');
        });
    });

    $router->group(['prefix' => '/allocations-vs-rdv'], function () use ($router) {
        $router->get('/', 'AllocationsVsRdvController@all');

        $router->group(['prefix' => '{allocationVsRdvID}'], function () use ($router) {
            $router->get('/', 'AllocationsVsRdvController@get');
        });
    });

    $router->group(['prefix' => '/stocks-plateformes'], function () use ($router) {
        $router->get('/', 'StocksPlateformesController@all');

        $router->group(['prefix' => '{stockPlateformeID}'], function () use ($router) {
            $router->get('/', 'StocksPlateformesController@get');
        });
    });
});

$router->get('/', function () { echo 'Coucou c\'est nous';});