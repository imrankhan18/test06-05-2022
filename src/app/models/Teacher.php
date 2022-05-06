<?php

class Teacher extends ResourceModel
{
    public $table = 'teacher';
    public $primaryKey = 'id';
    public $connection = false;

    public function  __construct($connection)
    {
        $this->connection = $connection;
    }
}
