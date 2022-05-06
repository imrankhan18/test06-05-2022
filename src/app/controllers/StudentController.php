<?php

use Phalcon\Mvc\Controller;

class StudentController extends Controller
{
    public function indexAction(): void
    {

        $student = new Student();
        $student->setRollNo(10);
        $student->setName('Ram');
        $student->setAddress('33, Vishwash Khand, GomtiNagar Lucknow');
        $student->insert();
    }
}
