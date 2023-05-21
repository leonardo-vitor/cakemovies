<?php
App::uses('AppModel', 'Model');

class Category extends AppModel
{
    public $name = "Category";
    public $hasMany = "Movie";
    public $validate = [
        "name" => ['rule' => 'notBlank']
    ];
}