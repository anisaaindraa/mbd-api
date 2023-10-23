<?php

declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    // get buah
    $app->get('/buah', function (Request $request, Response $response) {
        $db = $this->get(PDO::class);

        $query = $db->query('CALL ReadBuah()');
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $response->getBody()->write(json_encode($results));

        return $response->withHeader("Content-Type", "application/json");
    });

    // get penjual
    $app->get('/penjual', function (Request $request, Response $response) {
        $db = $this->get(PDO::class);

        $query = $db->query('CALL ReadPenjual()');
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $response->getBody()->write(json_encode($results));

        return $response->withHeader("Content-Type", "application/json");
    });

    // get pembeli
    $app->get('/pembeli', function (Request $request, Response $response) {
        $db = $this->get(PDO::class);

        $query = $db->query('CALL ReadPembeli()');
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $response->getBody()->write(json_encode($results));

        return $response->withHeader("Content-Type", "application/json");
    });

    // get transaksi
    $app->get('/transaksi', function (Request $request, Response $response) {
        $db = $this->get(PDO::class);

        $query = $db->query('CALL ReadTransaksi()');
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $response->getBody()->write(json_encode($results));

        return $response->withHeader("Content-Type", "application/json");
    });

    // get detail_transaksi
    $app->get('/detail_transaksi', function (Request $request, Response $response) {
        $db = $this->get(PDO::class);

        $query = $db->query('CALL ReadDetailTransaksi()');
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $response->getBody()->write(json_encode($results));

        return $response->withHeader("Content-Type", "application/json");
    });
};
