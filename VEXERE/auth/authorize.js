// phan quyen
const authorize=(arrType)=>(req,res,next)=>{
    // nhạn lai user
    const {user}=req;
    if(arrType.findIndex((ele)=>ele===user.type)>-1){
        next();
    }else{
        res.status(403).send("ban da dang nhap ,nhung ko co quyen ")
    }

}
module.exports={
    authorize
}