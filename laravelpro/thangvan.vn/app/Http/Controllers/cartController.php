<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\cartController\add;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart as Cart;
use Illuminate\Http\Request;



class cartController extends Controller
{
    //
    public function show()
    {
        return view("cart.show");
    }

    public function add(Request $request, $id)
    {
        $product=Product::find($id);
        // return $product;
        //  xoa tat ca di lam lai
        // Cart::destroy();

        Cart::add([
            'id'=>$product->id,
            'name'=>$product->name,
            'qty'=>1,
            'price'=>$product->price,
            'options'=>['thumbnail'=>$product->thumbnail]
            
        ]);
        // them xong chuyen huong trang cart show
        return   redirect("cart/show");
       
          

        // echo "<pre>";

        // print_r(Cart::content());

        // echo "Thêm sản phẩm {$id} vào giỏ hàng";
    }

    function remove($rowId){
        Cart::remove($rowId);
        return redirect('cart/show');



    }
    function destroy(){
        Cart::destroy();
        return redirect('cart/show');



    }
    function update(Request $request){
        // dd($request->all());
        $data=$request->get('qty');
        foreach ($data as $k => $v) {
           Cart::update($k,$v);
        }

        return redirect("cart/show");




    }
}
