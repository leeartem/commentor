<?php

namespace App\Controllers;

use App\Validators\Validate;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Comment;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index(Request $request)
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../templates');
        $twig = new \Twig\Environment($loader, [
            'cache' => __DIR__ . '/../../cache',
        ]);
        $template = $twig->load('index.html');

        echo $template->render(['the' => 'variables', 'go' => 'here']);
    }
}