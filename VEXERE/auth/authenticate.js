const  jwt  = require("jsonwebtoken")
const authenticate=(req,res,next)=>{

    try {
        const token=req.header("token")
       const decode= jwt.verify(token,"thang-dai-03")
       if(decode){
        // tao key moi
        req.user=decode
        return next()
       }else{
        res.status(401).send("ban chua dang nhap")
       }
        
    } catch (error) {
        res.status(401).send(error)
        
    }

}

module.exports={
    authenticate
}