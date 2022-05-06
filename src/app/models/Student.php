<?php

class Student extends ResourceModel
{
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setRollNo($rollno)
    {
        $this->rollno = $rollno;
    }
    public function setAddress($address)
    {
        $this->address = $address;
    }
}
