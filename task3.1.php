<?php

class AnimalFactory
{
    public function CreateAnimal($type)
    {
        $dog = function () use ($type) {
            if ($type == 'dog') {
                return new Dog();
            }
        };
        $cat = function () use ($type){
            if ($type == 'cat'){
                return new Cat();
            }
        };
    }
}