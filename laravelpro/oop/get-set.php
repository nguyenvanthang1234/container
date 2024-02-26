<?php
// class demo{
//     public $attr_1;
//     public function getValue(){
//         return $this->attr_1;
//     }
//     public function setValue($value){
//         $this ->attr_1=$value;
//     }

// }
// $a =new demo;
// // $a->attr_1=40;
// $a->setValue(70);
// echo $a->getValue();


class Rectangle {
    public $width;
    public $height;

   public function setValue($width,$height){
    $this->width=$width;
    $this->height=$height;
   }

    public function getPerimeter(){
       return 2*($this->width+$this->height);
    }
    public function getArea(){
       return $this->width*$this->height;
    }



}
   //   khoi tao doi tuong thuoc vao lop
   $a = new Rectangle();
   
 $a->setValue(4,5);

echo $a->getPerimeter();
?>