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
        header('Access-Control-Allow-Origin: *');
        // header('Access-Control-Allow-Methods: GET, POST');
        // header("Access-Control-Allow-Headers: X-Requested-With");
        header("Referrer-Policy: same-origin");
        
        $valdation = Validate::validate($request->request->all());
        
        
        if (!empty($valdation)) {
            $response = new Response(
                'Error',
                Response::HTTP_FORBIDDEN,
                [
                    'content-type' => 'application/json',
                    'Access-Control-Allow-Origin' => '*',
                ]
            );
            return $response->send();
        }

        $comment = new Comment();
        $comment->create($request->request->all());
        $response = new Response(
            'Ok',
            Response::HTTP_OK,
            [
                'content-type' => 'application/json',
                'Access-Control-Allow-Origin' => '*',
                // 'Access-Control-Allow-Methods' => 'GET, POST',
                // 'Access-Control-Allow-Headers' => 'X-Requested-With',
            ]
        );

header("Access-Control-Allow-Origin: *");


        

        return $response->send();
    }

    public function get(Request $request)
    {
        $comment = new Comment();
        $r = $comment->get();

        $response = new Response(
            json_encode($r),
            Response::HTTP_OK,
            [
                'content-type' => 'application/json',
                'Access-Control-Allow-Origin' => '*',
            ]
        );
        // $response->headers->set('Content-Type', 'text/plain');
        return $response->send();
    }
}