<?php
// namespace App\Models;
use Phalcon\Mvc\Model;

class ResourceModel extends Model
{
    public $primaryKey = 'id';
    public $connection = false;
    public $table = '';
    public function load($value)
    {
    }


    public function insert()
    {
        $this->connection = $this->di->get('mongo');
        $this->connection->test1->student->insertOne(['rollno' => $this->rollno, 'name' => $this->name, 'address' => $this->address]);
    }

    // public function delete()
    // {
    // }

    // public function update()
    // {
    // }
}
