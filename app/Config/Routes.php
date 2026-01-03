<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// CPU 관련 API 라우트
$routes->get('api/cpus', 'CpuController::index');                // 전체 CPU 목록
$routes->get('api/cpus/(:num)', 'CpuController::show/$1');       // 특정 CPU 조회
$routes->get('api/cpus/name/(:segment)', 'CpuController::byName/$1');        // 이름으로 조회
$routes->get('api/cpus/search/(:segment)', 'CpuController::searchByName/$1'); // 이름 LIKE 검색
$routes->get('api/cpus/hot', 'CpuController::hot');              // 인기 CPU 목록
$routes->get('api/cpus/manufacturer/(:segment)', 'CpuController::byManufacturer/$1'); // 제조사별 조회
$routes->get('api/cpus/core/(:num)', 'CpuController::byCore/$1'); // 코어 수별 조회
$routes->get('api/cpus/thread/(:num)', 'CpuController::byThread/$1'); // 쓰레드 수별 조회
$routes->get('api/cpus/release/(:num)', 'CpuController::byRelease/$1'); // 출시년도별 조회
$routes->get('api/cpus/distribution', 'CpuController::distribution');   // 코어 분포 집계

// CPU 관련 API 라우트(그룹)
// $routes->group('api/cpus', function ($routes) {
//     $routes->get('/', 'CpuController::index');
//     $routes->get('hot', 'CpuController::hot');
//     $routes->get('distribution', 'CpuController::distribution');
//     $routes->get('(:num)', 'CpuController::show/$1');
//     $routes->get('name/(:segment)', 'CpuController::byName/$1');
//     $routes->get('search/(:segment)', 'CpuController::searchByName/$1');
//     $routes->get('manufacturer/(:segment)', 'CpuController::byManufacturer/$1');
//     $routes->get('core/(:num)', 'CpuController::byCore/$1');
//     $routes->get('thread/(:num)', 'CpuController::byThread/$1');
//     $routes->get('release/(:num)', 'CpuController::byRelease/$1');
// });

