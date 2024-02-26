<?php



class demo{
    public $attr_1;
   private $attr_2;
   protected $attr_3=70;
}
// private ko duoc truy cap tu ben ngoai neu o lop con ke thua van duoc
// protected ko duoc truy cap tu ben ngoai neu o lop con ke thua van duoc

// $b=new demo;
// $b->attr_1=50;

// echo $b->attr_1;
class ngu extends demo{
function __construct()
{
    echo $this->attr_3;
}
}
 new ngu;

?>