<?php
$array1 = array (
    "numbers" => array (
        "1"=>"one",
        "2"=>"two",
        "3"=>"three",
    )
);
echo '<pre> Line: ' . __LINE__ . ' | ' . __FILE__ . PHP_EOL;
print_r($array1);
echo PHP_EOL . '</pre>' . PHP_EOL;

foreach($array1 as $key => $value)
{
    foreach($value as $key1 => $value1)
    {
        echo "$key1=>$value1" .'<br/>';
    }
}
?>