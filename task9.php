<?php

interface SortStrategy
{
    public function sort(array $array): array;
}

class BinarySortStrategy implements SortStrategy
{
    public function sort(array $array): array
    {
        echo "Sorting using binary sort";

        $start = 25;
        $counter = count($array);

        function preparation($counter, $start) { // основная функция, которая осуществляет все действия

            global $array;
            $counter = count($array)/2; // создана переменная $counter для подсчета количества элементов в массивах
            if(!($counter%2 == 0)){
                $counter = $counter + 0.5;
            }

            sort($array); // функция для сортировки массива, поскольку бинарный поиск работает только с сортироваными массивами
            print_r($array);

            $slice = array_slice($array, $counter, $counter); // функция для разделения основного массива

            $GLOBALS["slice"] = $slice;

            foreach ($slice as $item) { // цикл для определения крайнего нижнего элемента
                $arg = $item;
                $GLOBALS["arg"] = $arg;
                print_r($arg);
                break;
            }

            $slice1 = array_slice($array, 0, $counter - 1); // функция для разделения основного массива

            $GLOBALS["slice1"] = $slice1;
            echo ' ';
            $arg1 = end($slice1); // определние крайнего верхнего элемента
            $GLOBALS["arg1"] = $arg1;
            print_r($GLOBALS["arg1"]);

            foreach ($array as $i) { // определение центрального элемента
                if ($i > $GLOBALS["arg1"] && $i < $GLOBALS["arg"]) {
                    $middle = $i;
                    $GLOBALS["middle"] = $middle;
                }
            }
            echo ' ';
            print_r($GLOBALS["middle"]);
            echo '<pre>';echo '<pre>';echo '<pre>';echo '<pre>';

            if($start < $GLOBALS["arg1"]){
                $array = $GLOBALS["slice1"];
                return preparation($counter, $start);
            }elseif($start == $GLOBALS["arg1"]){
                echo "Это и есть искомое значение: $start";
            }
            if($start > $GLOBALS["arg"]){
                $array = $GLOBALS["slice"];
                return preparation($counter, $start);
            }elseif($start == $GLOBALS["arg"]){
                echo "Это и есть искомое значение: $start";
            }
            if($start == $GLOBALS["middle"]){
                echo "Это и есть искомое значение: $start";
            }
        }

        preparation($counter, $start);
        echo '<pre>';echo '<pre>';echo '<pre>';echo '<pre>';

        return $array;
    }
}

class InterpolationSortStrategy implements SortStrategy
{
    public function sort(array $array): array
    {
        echo "Sorting using quick sort";

        $count = count($array);

        vendor();
        function vendor(){
            var_dump($GLOBALS['r']);
            echo '<pre>';
            global $array, $c, $a, $count;

            if (!function_exists('formula_first')) {
                function formula_first($a, $array, $count){
                    $kx = array_key_first($array);
                    $x = $array[$kx];

                    $kb = array_key_last($array);
                    $b = $array[$kb];

                    $chislitel = (($a - $x)*($count - $kx) + $kx*($b - $x));
                    $znamenatel = $b - $x;
                    $key_a = ceil($chislitel/$znamenatel);
                    $GLOBALS['key_a'] = $key_a;
                    //print_r("$array[$key_a]");
                    check($array, $a);
                }
            }
            if (!function_exists('formula_second')) {
                function formula_second($a, $array, $count) {
                    $GLOBALS['w'] = 1;
                    $kx = array_key_first($array);
                    $x = $array[$kx];

                    $chislitel = (($a - $x)*($count - $kx) + $kx*($GLOBALS['b'] - $x));
                    $znamenatel = $GLOBALS['b'] - $x;
                    $key_a = ceil($chislitel/$znamenatel);
                    $GLOBALS['key_a'] = $key_a;
                    print_r("$key_a");
                    check($array, $a);
                }
            }
            if (!function_exists('formula_third')) {
                function formula_third($a, $array, $count){
                    $GLOBALS['r'] = 1;
                    $kb = array_key_last($array);
                    $b = $array[$kb];

                    $chislitel = (($a - $GLOBALS['x'])*($count - $GLOBALS['key_x']) + $GLOBALS['key_x']*($b - $GLOBALS['x']));
                    $znamenatel = $b - $GLOBALS['x'];
                    $key_a = ceil($chislitel/$znamenatel);
                    $GLOBALS['key_a'] = $key_a;
                    print_r("$key_a");
                    check($array, $a);
                }
            }

            if($GLOBALS['c'] == NULL){
                $GLOBALS['c'] = 1;
                formula_first($a, $array, $count);
                print_r("Try 1 formula");
                print_r($c);
            }
            if (!($GLOBALS['w'] == NULL)){
                formula_second($a, $array, $count);
                print_r("Try 2 formula");
                print_r($GLOBALS['key_a']);
            }
            if(!($GLOBALS['r'] == NULL)){
                formula_third($a, $array, $count);
                echo '<pre>';
                print_r($GLOBALS['key_a']);
                print_r("Try 3 formula");
            }

        }


        function check($array, $a)
        {
            if ($a == $array[$GLOBALS['key_a']]) {
                $fiasko = $array[$GLOBALS['key_a']];
                print_r("Find $fiasko");
                die;
            }
            //var_dump($array[$GLOBALS['key_a']]);
            if ($a < $array[$GLOBALS['key_a']]) {
                $GLOBALS['w'] = 1;
                $GLOBALS['b'] = $array[$GLOBALS['key_a']];
                //print_r("i'm stuck here2");
                return vendor();

            }
            if ($a > $array[$GLOBALS['key_a']]) {
                $GLOBALS['r'] = 1;
                $GLOBALS['x'] = $array[$GLOBALS['key_a']];
                $GLOBALS['key_x'] = $GLOBALS['key_a'];
                //print_r("i'm stuck here3");
                return vendor();
            }
            return 0;
        }

        return $array;
    }
}

class ConsistentSortStrategy implements SortStrategy
{
    public function sort(array $array): array
    {
        echo "Sorting using consistent sort";

        $start = 25;

        foreach ($array as $tohere){
            if ($tohere == $start){
                echo "Это наше искомое значение: $start";
            }
        }

        return $array;
    }
}

class StupidSortStrategy implements SortStrategy
{
    public function sort(array $array): array
    {
            $i = 1;
            $size = count($array);

            while($i < $size) {
                if($array[$i - 1] <= $array[$i]){
                    ++$i;
                }else{
                    list($arr[$i - 1], $arr[$i]) = array($array[$i], $array[$i - 1]);
                    $i = 1;
                }
            }
            return $array;
    }
}

class Sorter
{
    protected $sorter;

    public function __construct(SortStrategy $sorter)
    {
        $this->sorter = $sorter;
    }

    public function sort(array $dataset): array
    {
        return $this->sorter->sort($dataset);
    }
}

$array = [1, 4, 6, 7, 9, 12, 14, 25, 43, 51, 52, 90];

$sorter = new Sorter(new BinarySortStrategy());
$sorter->sort($array);

$sorter = new Sorter(new InterpolationSortStrategy());
$sorter->sort($array);