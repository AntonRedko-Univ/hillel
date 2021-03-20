<?php
$animal = 'dog';

$dog = function() use ($animal)
{
            print_r('Added new dog');
    };

$cat = function () use ($animal)
{
            print_r('Added new cat');
    };

$creator = function () use ($animal, $dog, $cat){
    var_dump($animal);
    if($animal == 'dog')
    {
        $dog();
    }else{
        $cat();
    }

};
$creator();