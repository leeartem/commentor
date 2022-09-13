<?php

error_reporting(E_ERROR | E_PARSE);

use Symfony\Component\HttpFoundation\Request;
use App\Controllers\HomeController;
use App\Controllers\CommentController;

require __DIR__ . '/../vendor/autoload.php';

App\App::create();

// $request = Request::createFromGlobals();

// var_dump($request );

//         $router = new \Bramus\Router\Router();
//         $router->get('/', function() use ($request) {
//             (new HomeController)->index($request);
//         });
//         // $router->get('/comments', function() use ($request) {
//         //     (new CommentController)->get($request);
//         // });
//         $router->post('/comments', function() use ($request) {
//             echo 212312;
//             (new CommentController)->store($request);
//         });
//         $router->run();