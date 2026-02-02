<?php

namespace App\Html;

use App\Repositories\BaseRepository;
use App\Repositories\ActorsRepository;
use App\Repositories\CastingRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\DirectorsRepository;
use App\Repositories\MoviesRepository;
use App\Repositories\StudioRepository;

class Request
{
    static array $acceptedRoutes = [
        'POST' => [
            '/actors',
            '/casting',
            '/category',
            '/directors',
            '/movies',
            '/studio'
        ],
        'GET' => [
            '/actors',
            '/actors/{id}',
            '/casting',
            '/casting/{id}',
            '/category',
            '/category/{id}',
            '/directors',
            '/directors/{id}',
            '/movies',
            '/movies/{id}',
            '/studio',
            '/studio/{id}',
        ],
        'PUT' => [
            '/actors/{id}',
            '/casting/{id}',
            '/category/{id}',
            '/directors/{id}',
            '/movies/{id}',
            '/studio/{id}',
        ],
        'DELETE' => [
            '/actors/{id}',
            '/casting/{id}',
            '/category/{id}',
            '/directors/{id}',
            '/movies/{id}',
            '/studio/{id}',
        ]
    ];

    static function handle()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        if (!self::isRouteAllowed($requestMethod, $requestUri, self::$acceptedRoutes)) {
            Response::error("Rút nát allóvd", 400);
        }

        $requestData = self::getRequestData();
        $arrUri = self::requestUriToArray($_SERVER['REQUEST_URI']);
        $resourceName = self::getResourceName($arrUri);
        $resourceId = self::getResourceId($arrUri);
        $childResourceName = self::getChildResourceName($arrUri);
        $childResourceId = self::getChildResourceId($arrUri);

        switch ($requestMethod) {
            case "POST":
                self::postRequest($resourceName, $requestData);
                break;
            case "PUT":
                self::putRequest($resourceName, $resourceId, $requestData);
                break;
            case "GET":
                self::getRequest($resourceName, $resourceId);
                break;
            case "DELETE":
                self::deleteRequest($resourceName, $resourceId);
                break;
            default:
                echo 'Ánknó rekveszt tájp';
                break;
        }

    }

    private static function getRequestData(): ?array
    {
        return json_decode(file_get_contents("php://input"), true);
    }

    private static function requestUriToArray($uri): array
    {
        $arrUri = explode("/", trim($uri, "/"));
        return [
            'resourceName' => $arrUri[0] ?? null,
            'resourceId' => !empty($arrUri[1]) ? (int)$arrUri[1] : null,
            'childResourceName' => $arrUri[2] ?? null,
            'childResourceId' => !empty($arrUri[3]) ? (int)$arrUri[3] : null
        ];
    }

    private static function getResourceName(array $arrUri): ?string
    {
        return $arrUri['resourceName'];
    }

    private static function getResourceId(array $arrUri): ?int
    {
        return $arrUri['resourceId'];
    }

    private static function getChildResourceName(array $arrUri): ?string
    {
        return $arrUri['childResourceName'];
    }

    private static function getChildResourceId(array $arrUri): ?int
    {
        return $arrUri['childResourceId'];
    }

    private static function isRouteMatch($route, $uri): bool
    {
        $routeParts = explode('/', trim($route, '/'));
        $uriParts = explode('/', trim($uri, '/'));

        if (count($routeParts) !== count($uriParts)) {
            return false;
        }

        foreach ($routeParts as $index => $routePart) {
            if (preg_match('/^{.*}$/', $routePart)) {
                continue;
            }
            if ($routePart !== $uriParts[$index]) {
                return false;
            }
        }

        return true;
    }

    private static function isRouteAllowed($method, $uri, $routes): bool
    {
        if (!isset($routes[$method])) {
            return false;
        }

        foreach ($routes[$method] as $route) {
            if (self::isRouteMatch($route, $uri)) {
                return true;
            }
        }

        return false;
    }

    private static function getRepository($resourceName): ?BaseRepository
    {
        switch ($resourceName) {
            case 'actors':
                $repository = new ActorsRepository();
                break;
            case 'casting':
                $repository = new CastingRepository();
                break;
            case 'category':
                $repository = new CategoryRepository();
                break;
            case 'directors':
                $repository = new DirectorsRepository();
                break;
            case 'movies':
                $repository = new MoviesRepository();
                break;
            case 'studio':
                $repository = new StudioRepository();
                break;
            default:
                $repository = null;
        }

        return $repository;
    }

    private static function postRequest($resourceName, $requestData)
    {
        $repository = self::getRepository($resourceName);
        if (!$repository) {
            Response::error("Kudünt get repozitori", 400);
            return;
        }

        $newId = $repository->create($requestData);
        if ($newId) {
            Response::created(['id' => $newId]);
            return;
        }

        Response::error("Bed rekveszt", 400);
    }

    private static function deleteRequest($resourceName, $resourceId)
    {
        $repository = self::getRepository($resourceName);
        $result = $repository->delete($resourceId);
        if ($result) {
            Response::deleted();
            return;
        }
        Response::error("Nát dilited", 404);
    }

    private static function getRequest($resourceName, $resourceId = null)
    {
        $repository = self::getRepository($resourceName);

        if ($resourceId) {
            $entity = $repository->find($resourceId);
            if (!$entity) {
                Response::error("Nát fáund", 404);
                return;
            }
            Response::ok($entity);
            return;
        }

        $entities = $repository->getAll();
        Response::ok($entities);
    }

    private static function putRequest($resourceName, $resourceId, $requestData)
    {
        $repository = self::getRepository($resourceName);
        $entity = $repository->find($resourceId);
        if ($entity) {
            $data = [];
            foreach ($requestData as $key => $value) {
                $data[$key] = $value;
            }
            $result = $repository->update($resourceId, $data);
            if ($result) {
                Response::updated();
            }
        }
        Response::error('Nát ápdétid', 404);
    }
}