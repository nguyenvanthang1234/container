<?php
class A {
    public $attr_1=100;

    function method_1()
    {
        echo " ngu";

    }

}
class B extends A{
 public function method_2(){
      return $this->attr_1;

 }
  
}
$b= new B;
echo $b->method_2();
?>