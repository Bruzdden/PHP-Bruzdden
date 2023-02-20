<?php
echo "hello world";

$result = [];
$nums = explode(",", filter_input(INPUT_GET, "num"));

function check(){
}
function checkopration($oprtn)
{
switch($oprtn)
        {   
            case "add":
                if (count($nums) <= 1){
                    $result = ["result" => "ERROR MORE"];
                    break;
                }
                foreach ($nums as $num){
                    if (!is_numeric($num)){
                        $result = ["result" => "NO NUMBER EXIST"];
                        break 2;
                    }
                    $sum += $num;
                }
                $result = ["result" => $sum];
            break;

            case 'substract':
            return $this->num1 - $this->num2;
            break;

            case 'times':
            return $this->num1 * $this->num2;
            break;

            case 'divide':
            return $this->num1 / $this->num2;
            break;

            default:
                $result = ["result" => "Error more"];
        }
}
function getresult()
    {
        return checkopration(filter_input(INPUT_GET, "operation"));
    }

getresult()
echo json_encode($result);
        

?>
