<?php

namespace App\Validators;

use Rakit\Validation\Validator;

class Validate
{
    static public function validate($request)
    {
        $validator = new Validator;

        $validation = $validator->validate($request, [
            'name'                  => 'required',
            'email'                 => 'required|email',
            'title'              => 'required|min:6',
            'text'              => 'required|min:10',
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            echo "<pre>";
            print_r($errors->firstOfAll());
            echo "</pre>";
            return $errors->firstOfAll();
        } else {
            return [];
        }
    }
}
