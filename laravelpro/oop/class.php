<?php
 class Rectangle {
     public $width;
     public $height;

// khong can goi cung chay
     public function __construct(){
       $this->width=12;
       $this->height=12;
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
    //  gan gia tri moi cho no
    // $a->height=4;

 echo $a->getPerimeter();

?>