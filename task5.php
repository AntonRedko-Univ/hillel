<?php

abstract class Animals
{
    abstract function test();
}

abstract class Vehicle
{
    abstract function test();
}

class Predators extends Animals
{

    function test()
    {
        return 1;
    }

    function func()
    {
        print_r('Predators dont eat vegetables');
    }
}

class Herbivores extends Animals
{
    function test()
    {
        return 2;
    }

    function func()
    {
        print_r('Herbivores eat vegetables');
    }
}

class Ships extends Vehicle
{
    function test()
    {
        return 3;
    }
    function func()
    {
        print_r('Ships can swim');
    }
}

class Cars extends Vehicle
{
    function test()
    {
        return 4;
    }
    function func()
    {
        print_r('Cars can ride by the road');
    }
}

class FreightCars extends Vehicle
{
    function test()
    {
        return 5;
    }
    function func()
    {
        print_r('Freight cars can carry heavy loads');
    }
}

class A
{
    function func(Animals $obj){
        return $obj->func('string');
    }
}

class V
{
    function func(Vehicle $obj){
        return $obj ->func('string');
    }
}

$objPredators = new Predators();
$objHerbivores = new Herbivores();
$objShips = new Ships();
$objCars = new Cars();
$objFreightCars = new FreightCars();
$objA = new A;
$objV = new V;


echo $objA->func($objPredators);
$objV->func($objCars);
$objV->func($objShips);
$objV->func($objFreightCars);
