<?php
App::uses('AppModel', 'Model');

class Movie extends AppModel
{
    public $belongsTo = "Category";
    public $name = "Movie";

    public $validate = [
        "category_id" => ['rule' => 'notBlank'],
        "title" => ['rule' => 'notBlank'],
        /*"cover" => ['rule' => 'blank'],*/
        "synopsis" => ['rule' => 'notBlank']
    ];
}