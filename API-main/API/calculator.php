<?php

$result = [];

$pos = $_POST;

$operation = $_REQUEST["url"];
$numbers = $pos['nums']; 

$numCount = count($numbers);

if ($numCount < 2) {
    $result = ["report" => "ERROR", "result" => "MUSI BYT MINIMALNE DVE CISLA"];
} else {
    switch ($operation) {
        case "sum":
            $sum = 0;
            foreach ($numbers as $number) {
                $sum += $number;
            }
            $result = ["report" => "OK", "result" => $sum];
            break;
        case "sub":
            $sub = $numbers[0];
            array_shift($numbers);
            foreach ($numbers as $number) {
                $sub -= $number;
            }
            $result = ["report" => "OK", "result" => $sub];
            break;
        case "mul":
            $mul = $numbers[0];
            array_shift($numbers);
            foreach ($numbers as $number) {
                $mul *= $number;
            }
            $result = ["report" => "OK", "result" => $mul];
            break;
        case "div":
            $div = $numbers[0];
            array_shift($numbers);
            foreach ($numbers as $number) {
                $div /= $number;
            }
            $result = ["report" => "OK", "result" => $div];
            break;
        default:
            $result = ["report" => "ERROR", "result" => "ERROR"]; 
    }
}

echo json_encode($result);

?>
