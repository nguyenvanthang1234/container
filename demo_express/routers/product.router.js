const express=require("express")
const {  getdetailproduct,
    getlistproduct,
    add,
    update,
    delete1}=require("../controllers/product.controller")
const productRouter=express.Router()


productRouter.get("/products",getlistproduct)
  
productRouter.get("/products/:id",getdetailproduct)
  


productRouter.post("/add", add);

// Hàm cập nhật thông tin sản phẩm
productRouter.put("/update/:id",update );

  
productRouter.delete("/delete/:id",delete1)
  

module.exports=productRouter;

