<?php
App::uses('AppModel', 'Model');

class Category extends AppModel
{
    public $name = "Category";
    public $validate = [
        "name" => ['rule' => 'notBlank']
    ];
}