<?php


// ИНТЕРФЕЙС //


interface Car
{
    public function body(): string;

    public function formula(): string;

    public function engine(): int;

    public function transmission(): string;
}

class X implements Car
{
    protected $body = 'compartment';

    protected $formula = '2x4';

    protected $engine = '2';

    protected $transmission = 'Machine';


    public function body(): string
    {
        return 1;
    }
    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }


    public function formula(): string
    {
        return 2;
    }
    /**
     * @return string
     */
    public function getFormula(): string
    {
        return $this->formula;
    }


    public function engine(): int
    {
        return 3;
    }
    /**
     * @return int
     */
    public function getEngine(): int
    {
        return $this->engine;
    }


    public function transmission(): string
    {
        return 4;
    }
    /**
     * @return string
     */
    public function getTransmission(): string
    {
        return $this->transmission;
    }
}
class Engine
{
    function func(X $obj){
        return $obj->getEngine();
    }
}

class Formula
{
    function func(X $obj){
        return $obj->getFormula();
    }
}

class Body
{
    function func(X $obj){
        return $obj->getBody();
    }
}

class Transmission
{
    function func(X $obj){
        return $obj->getTransmission();
    }
}

$objX = new X();
$objEngine = new Engine();
$objFormula = new Formula();
$objBody = new Body();
$objTransmission = new Transmission();

echo $objEngine->func($objX);
echo '<pre>';
echo $objFormula->func($objX);
echo '<pre>';
echo $objBody->func($objX);
echo '<pre>';
echo $objTransmission->func($objX);
echo '<pre>';




// TRAIT //



trait Counting
{
    public function CountingFunc($volume, $frequency, $pressure)
    {
        echo ($volume*$frequency*$pressure)/120;
    }
}

class FinallyCount
{
    use Counting;
}

$power = new FinallyCount();
$power->CountingFunc(2 , 5000, 0.84);
