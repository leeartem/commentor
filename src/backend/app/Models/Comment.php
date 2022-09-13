<?php

namespace App\Models;

class Comment extends Entity
{
    protected $tableName = 'comments';

    public $id;

    public $title;

    public $text;

    public $name;

    public $email;

    public $created_at;

    // public function save() {
        
    // }
}