<?php


 class Rectangle {
    public static $width;
    public static $height;



    public function getPerimeter(){
       return 2*(self::$width+self::$height);
    }
    public static function getArea(){
       return self::$width*self::$height;
    }



}

class demo{
    function __construct()
    {
        Rectangle::$width=15;
        Rectangle::$height=15;
     
        echo  Rectangle::getArea();

    }


}
new demo;

?>