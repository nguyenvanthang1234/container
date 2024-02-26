let productlist=[
    {
        "id":1,
        "fullname":"bim bim",
        "amount":"10",
        "price":"500",
        "sale":"120"
    },
    {
        "id":2,
        "fullname":"kem",
        "amount":"20",
        "price":"1000",
        "sale":"100"
    }
]


const getlist=()=>{
    if(productlist){
        return productlist
    }else{
        return false
    }

}
 const getdeatil=(id)=>{
    const index=productlist.findIndex((product)=> product.id==id)
    if(index!=-1){
        const product=productlist[index]
        return(product )
    }else{
        return false
    }
     
 }

 const add1=(product)=>{
        const newProduct = {
            id: Math.random().toString(),
            ...product
        };
      // Thêm sản phẩm mới vào danh sách sản phẩm
      productlist = [...productlist, newProduct];
      return(newProduct); // Sử dụng status 201 để thông báo tạo thành công

 }

 const update1=(id,product)=>{
    const index = productlist.findIndex((product) => product.id == id);
    if (index != -1) {
      const productOld = productlist[index];
      // Cập nhật thông tin sản phẩm hiện tại bằng cách gộp các thuộc tính mới
      const productNew = { ...productOld, ...product };
      productlist[index] = productNew;
      return(productNew);
    } else {
      return false// Sử dụng status 404 để thông báo không tìm thấy sản phẩm
    }
 }
const delete11=(id)=>{
    const index=productlist.findIndex((product)=> product.id==id)
    if(index!==-1){
     product=productlist[index]
     productlist.splice(index,1)
     return(product)
 
    }else{
    return false
    }

}
module.exports={
    getlist,
    getdeatil,
    add1,
    update1,delete11
}