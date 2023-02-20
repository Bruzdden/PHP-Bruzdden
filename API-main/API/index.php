<?php
date_default_timezone_set('UTC');
$pos = array('nums' => [4, 2, 7], 'dttm' => date("Y-m-d H:i:s"));

$op = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($pos),
    ),
);

$res = file_get_contents('http://localhost/my-app/API/calculator.php', false, stream_context_create($op));

echo $res;
?>