<?php
declare(strict_types=1);

namespace App;

class Contact{
    private $id;
    private $name;
    private $email;
    private $phone;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'] ?? '';
        $this->email = $data['email'] ?? '';
        $this->phone = $data['phone_number'] ?? '';
    }

   
    //definition de la methode toString

    public function __toString()
    {
        return $this->id .", ". $this->name . ", " . $this->email . ", " . $this->phone . PHP_EOL;
    }

    //definition des getters et setters

    public function getId()
    {
        return $this->id;
    }

     public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone){
        $this->phone = $phone;
    }

}