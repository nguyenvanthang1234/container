const express=require("express")
const productRouter=require("./product.router")
const router=express.Router()

router.use(productRouter)

module.exports=router
