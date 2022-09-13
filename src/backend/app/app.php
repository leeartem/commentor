<?php

namespace App;

use Symfony\Component\HttpFoundation\Request;
use App\Controllers\HomeController;
use App\Controllers\CommentController;

class App
{
    static public function create()
    {        
        $request = Request::createFromGlobals();

        $router = new \Bramus\Router\Router();
        $router->get('/', function() use ($request) {
            (new HomeController)->index($request);
        });
        $router->get('/comments', function() use ($request) {
            (new CommentController)->get($request);
        });
        $router->post('/comments', function() use ($request) {
            (new CommentController)->store($request);
        });
        $router->run();


        // $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
        // $twig = new \Twig\Environment($loader, [
        //     'cache' => __DIR__ . '/../cache',
        // ]);
        // $template = $twig->load('index.html');

        // echo $template->render(['the' => 'variables', 'go' => 'here']);
    }
}