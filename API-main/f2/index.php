<?php
class Calculator
{
    private $numbers;

    public function __construct($numbers)
    {
        $this->numbers = $numbers;
    }

    public function sum()
    {
        if (count($this->numbers) < 2) {
            return ["report" => "ERR", "result" => "Not enough numbers. At least two."];
        }
        $sum = 0;
        foreach ($this->numbers as $number) {
            $sum += $number;
        }
        return ["report" => "OK", "result" => $sum];
    }

    public function sub()
    {
        if (count($this->numbers) < 2) {
            return ["report" => "ERR", "result" => "Not enough numbers. At least two."];
        }
        $sub = $this->numbers[0];
        array_shift($this->numbers);
        foreach ($this->numbers as $number) {
            $sub -= $number;
        }
        return ["report" => "OK", "result" => $sub];
    }

    public function mul()
    {
        if (count($this->numbers) < 2) {
            return ["report" => "ERR", "result" => "Not enough numbers. At least two."];
        }
        $mul = $this->numbers[0];
        array_shift($this->numbers);
        foreach ($this->numbers as $number) {
            $mul *= $number;
        }
        return ["report" => "OK", "result" => $mul];
    }

    public function div()
    {
        if (count($this->numbers) < 2) {
            return ["report" => "ERR", "result" => "Not enough numbers. At least two."];
        }
        $div = $this->numbers[0];
        array_shift($this->numbers);
        foreach ($this->numbers as $number) {
            $div /= $number;
        }
        return ["report" => "OK", "result" => $div];
    }
public function mod()
    {
        $mod = $this->numbers[0];
        array_shift($this->numbers);
        foreach ($this->numbers as $number) {
            $mod %= $number;
        }
        return ["report" => "OK", "result" => $mod];
    }

    public function sqrt()
    {
        if (count($this->numbers) > 1) {
            return ["report" => "ERR", "result" => "Too many numbers. Sqrt takes only one."];
        }
        $sqrt = floatval($this->numbers[0]);
        return ["report" => "OK", "result" => sqrt($sqrt)];
    }
}

$data = $_SERVER["REQUEST_URI"];
$data = explode("/", $data);
$operation = $data[3];
for($i = 0; $i<4; $i++)
{
    array_shift($data);
}
$numbers = $data;

$calculator = new Calculator($numbers);
if (method_exists($calculator, $operation)) {
    $reply = $calculator->$operation();
} else {
    $reply = ["report" => "ERR", "result" => "Input error."];
}
echo json_encode($reply);