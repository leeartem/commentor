<?php

namespace App\Validators;

use Rakit\Validation\Validator;

class Validate
{
    static public function validate(array $request): bool
    {
        $validator = new Validator;

        $validation = $validator->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'text' => 'required',
        ]);

        if ($validation->fails()) {
            return false;
        } else {
            return true;
        }
    }
}
