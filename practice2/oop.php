<?php
// <!-- create class or object : class is a blueprint for creating object nad object is an instance of class -->

class Car
{
    public $color;

    public function drive()
    {
        echo "The " . $this->color . " car is driving ";
    }
}

$myCar = new Car(); // object
$myCar->color = " Red";
$myCar->drive();

// using contructor ... a constructor is automatically runs when a object is created;

class User
{
    public $username;

    public function __construct($name)
    {
        $this->username = $name;
    }
}

$user = new User("munna");
echo $user->username;

// inheritance ; in php is a oop concept where a class can inherit properties and methods from another class. it allows the child class to reuse code from the parent class and extend or modify it's functionality.

class Animal
{
    public function speak()
    {
        echo "this sound is bow";
    }
}

class Dog extends Animal
{
    public function bark()
    {
        echo "this is bark";
    }
}

$dog = new Dog();
echo "<br>";
$dog->speak();
echo "<br>";
$dog->bark();


// encapsulation : hide data using access modifiers : like public, protect, private

class BankAccount
{
    private $balance = 0;

    public function deposit($amount)
    {
        $this->balance += $amount;
    }

    public function getBalance()
    {
        return $this->balance;
    }
}

$bal = new BankAccount();
$bal->deposit(450);
// echo $bal->getBalance();
$bal->getBalance();

// polymarphism: same method apply different class

class Shape
{
    public function draw()
    {
        echo "Drawing Shape";
    }
}

class Circle extends Shape
{
    public function draw()
    {
        echo "Drawing Circle";
    }
}

$shape = new Shape();
echo "<br>";
$shape->draw();
$circle = new Circle();
echo "<br>";
$circle->draw();

echo date("Y-m-d H:i:s");
?>