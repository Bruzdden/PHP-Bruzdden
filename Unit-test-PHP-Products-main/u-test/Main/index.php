<?php 

 
 

class Product { 

    private $name; 

    private $price; 

   

    public function __construct($name, $price) { 

      $this->name = $name; 

      $this->price = $price; 

    } 

   

    public function _getName() { 

      return $this->name; 

    } 

   

    public function _getPrice() { 

      return $this->price; 

    } 

  } 

   

  class Order { 

    private $product; 

    private $quantity; 

   

    public function __construct(Product $product, $quantity) { 

      $this->product = $product; 

      $this->quantity = $quantity; 

    } 

   

    public function _getProduct(): Product { 

      return $this->product; 

    } 

   

    public function _getQuantity() { 

      return $this->quantity; 

    } 

   

    public function _total() { 

      return $this->product->_getPrice() * $this->quantity; 

    } 

  } 

   

  $product = new Product("Honda", 9999); 

  $order = new Order($product, 5); 

   

  echo "Product name: " . $order->_getProduct()->_getName() . "\n"; 

  echo "Quantity: " . $order->_getQuantity() . "\n"; 

  echo "Total: $" . $order->_total() . "\n"; 

   

   

 
 
 

?> 