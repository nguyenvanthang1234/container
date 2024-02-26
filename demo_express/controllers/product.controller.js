const {getlist,getdeatil,add1,update1,delete11}=require("../service/product.services")
  
const getlistproduct=(req,res)=>{
    const product=getlist();
    if(product){
        res.send(product)
    }else{
        res.status(404).send("not found")
    }
}

const getdetailproduct=(req,res)=>{
    const parma=req.params;
    const id=parma.id;
    const product=getdeatil(id)
    if(product){
        res.status(200).send(product)
    }else{
        res.status(404).send("not found")
    }
   
}

const add=(req, res) => {
    let product=req.body;
    const productadd=add1(product)
    res.send(productadd)

}

const update=(req, res) => {
    // lay id va san pham xuong
    const id = req.params.id;
  const updatedProductData = req.body;
//   goi den ham ben srivice neutim thay cap nhat ko thi thoi
  const product=update1(id,updatedProductData)
  if(product){
    res.send(product)
  }else{
    res.send("ko tim thay")
  }
 
}

const delete1=(req,res)=>{
    const parmas=req.params
    const id=parmas.id
    const product=delete11(id)
    if(product){
        res.send(product)
    }else{
        res.send("not found")
    }

  
}

module.exports={
     getdetailproduct,
     getlistproduct,
     add,
     update,
     delete1
    
    }