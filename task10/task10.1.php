<?php

class Facade
{
    protected $subsystem1;

    public function __construct(Subsystem1 $subsystem1 = null) {
        $this->subsystem1 = $subsystem1 ?: new Subsystem1();
    }

    public function operation(): string
    {
        $result = $this->subsystem1->operation1();

        return $result;
    }
}

class Subsystem1
{
    public function operation1(): string
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, "http://api.openweathermap.org/data/2.5/weather?q=" . 'Moscow' . "&lang=ru&units=metric&appid=" . 'fe57b721fd47b8600afac45a7829c1ea');
        $data = json_decode(curl_exec($ch));
        curl_close($ch);
        $temp = $data->main->temp_min;
        $humidity = $data->main->humidity;
        $speed = $data->wind->speed;
        echo "Погода в городе:$data->name";
        echo "Погода:$temp";
        echo "Влажность:$humidity";
        echo "Ветер:$speed";

        return 0;
    }
}

function clientCode(Facade $facade)
{
    echo $facade->operation();
}

$subsystem1 = new Subsystem1();

$facade = new Facade($subsystem1);
clientCode($facade);