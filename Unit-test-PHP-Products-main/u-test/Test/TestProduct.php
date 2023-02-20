<?php 

require_once("..\Main\index.php"); 

 

class ProductTest { 

    private $product; 

     

    public function _setup() { 
        
        $this->product = new Product("iPhone", 999); 

    } 

     

    public function _testGetName() { 

        $expected = "iPhone"; 

        $actual = $this->product->_getName(); 

        if ($expected !== $actual) { 

            echo "Error: _testGetName failed. Expected $expected but got $actual." . PHP_EOL; 

        } 

    } 

     

    public function _testGetPrice() { 

        $expected = 999; 

        $actual = $this->product->_getPrice(); 

        if ($expected !== $actual) { 

            echo "Error: _testGetPrice failed. Expected $expected but got $actual." . PHP_EOL; 

        } 

    } 

} 

     

$productTest = new ProductTest(); 

$productTest->_setup(); 

$productTest->_testGetName(); 

$productTest->_testGetPrice(); 

 
 

?> 