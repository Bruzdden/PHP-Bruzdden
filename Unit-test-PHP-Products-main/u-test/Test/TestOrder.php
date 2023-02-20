<?php 

require_once("..\Main\index.php"); 

 

class OrderTest { 

    private $order; 

     

    public function _setup() { 

        $product = new Product("iPhone", 999); 

        $this->order = new Order($product, 2); 

    } 

     

    public function _testGetProduct() { 

        $actual = $this->order->_getProduct(); 

        if (!($actual instanceof Product)) { 

            echo "Error: _testGetProduct failed. Expected object of type Product but got " . _gettype($actual) . "." . PHP_EOL; 

        } 

    } 

     

    public function _testGetQuantity() { 

        $expected = 2; 

        $actual = $this->order->_getQuantity(); 

        if ($expected !== $actual) { 

            echo "Error: _testGetQuantity failed. Expected $expected but got $actual." . PHP_EOL; 

        } 

    } 

     

    public function _testTotal() { 

        $expected = 1998; 

        $actual = $this->order->_total(); 

        if ($expected !== $actual) { 

            echo "Error: _testTotal failed. Expected $expected but got $actual." . PHP_EOL; 

        } 

    } 

} 

     

$orderTest = new OrderTest(); 

$orderTest->_setup(); 

$orderTest->_testGetProduct(); 

$orderTest->_testGetQuantity(); 

$orderTest->_testTotal(); 

 
 

?> 