<?php

require "Storage\storage.php";

$lifo = new LIFO();
$lifo->store(new Element('first'));
$lifo->store(new Element('second'));
$lifo->store(new Element('third'));

var_dump($lifo->load());
var_dump($lifo->load());
var_dump($lifo->load());

?>
