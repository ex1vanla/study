<?php
abstract class  ProductAbstract{
    public function echoProduct(){
        echo 'Fatherclass';
    }
}



class Product extends Baseproduct {
    private $product = [];
    
    function __construct($product)
    {
        $this -> product = $product;
    }

    public function getProduct(){
        echo $this -> product;
    }

    public function addProduct($item){
        $this->product .= $item;
    }

    public static function getStaticProduct($str){
        echo $str;
    }
}

    $instance = new Product('Test');
    echo '<br>';
    $instance->getProduct();
    $instance->echoProduct();
    echo '<br>';
    $instance->addProduct('additem');
    echo '<br>';
    $instance->getProduct();
    echo '<br>';
    Product::getStaticProduct('truyen tham so');
    echo '<br>';



?>