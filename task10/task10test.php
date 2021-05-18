<?php
$apiKey = "fe57b721fd47b8600afac45a7829c1ea";
$city = "Kiev";
$url = "http://api.openweathermap.org/data/2.5/weather?q=" . 'Kiev' . "&lang=ru&units=metric&appid=" . $apiKey;


$ch = curl_init();

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);

$data = json_decode(curl_exec($ch));

curl_close($ch);
?>
<div class="weather">
    <h2>Погода в городе <?php echo $data->name; ?></h2>
<p>Погода: <?php echo $data->main->temp_min; ?>°C</p>
<p>Влажность: <?php echo $data->main->humidity; ?> %</p>
<p>Ветер: <?php echo $data->wind->speed; ?> км/ч</p>
</div>