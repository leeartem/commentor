<?php

namespace App\Controllers;

use App\Validators\Validate;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function store(Request $request)
    {        
        $validated = Validate::validate($request->request->all());

        var_dump($validated);
        
        
        if (!$validated) {
            $response = new Response(
                'Error',
                Response::HTTP_FORBIDDEN,
                ['content-type' => 'application/json']
            );
            return $response->send();
        }

        $comment = new Comment();
        $comment->create($request->request->all());
        $response = new Response(
            'Ok',
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );

        return $response->send();
    }

    public function get(Request $request)
    {
        $comment = new Comment();
        $r = json_encode($comment->get());

        $response = new Response(
            $r,
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );
        return $response->send();
    }
}