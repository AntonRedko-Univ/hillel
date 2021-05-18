<?php

// РАБОТА С КЛАССАМИ //

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
echo '<pre>';


// ХЕЛПЕРЫ //

// ХЕЛПЕР ДЛЯ МАССИВОВ //

$a = [1, 2, 3, 4];
$b = [2, 3, 4, 5];
$c = [3, 4, 5, 6];
$d = ['one' => 1, 'two' => 2, 'three' => 3, 'four' => 4];

class ArrayHelper
{
    public static function OutputValues($a)
    {
        print_r($a[1]);
    }
    public static function WritingValues($b)
    {
         $b[1] = 245;
         print_r($b);
    }
    public static function DeleteValues($c)
    {
        unset($c[1]);
        print_r($c);
    }
    public static function KeyCheck($d)
    {
        if(array_key_exists('one', $d))
        {
            print_r('This key are exist');
        }
    }
}

$output = ArrayHelper::OutputValues($a);
echo '<pre>';
$writing = ArrayHelper::WritingValues($b);

$delete = ArrayHelper::DeleteValues($c);

$check = ArrayHelper::KeyCheck($d);
echo '<pre>';



// ХЕЛПЕР ДЛЯ СТРОК //



$a = 'String too long';
$b = 'To massive';
$c = 'randomise please';
$d = 'tohighregister';

class StringHelper
{
    public static function LowRegister($a)
    {
         $s = lcfirst($a);
         print_r($s);
    }
    public static function StringtoMassive($b)
    {
        print_r(str_split($b));
    }
    public static function Shuffle($c)
    {
        print_r(str_shuffle($c));
    }
    public static function HighAllRegister($d)
    {
        print_r(strtoupper($d));
    }
}

$low = StringHelper::LowRegister($a);
echo '<pre>';
$tomassive = StringHelper::StringtoMassive($b);
echo '<pre>';
$shuffle = StringHelper::Shuffle($c);
echo '<pre>';
$tohigh = StringHelper::HighAllRegister($d);
echo '<pre>';



