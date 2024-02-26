
const checkEmpty =(req,res,next)=>{
    const {fullname,age ,numberClass}=req.body
    if(fullname && age && numberClass){
        next()
    }else{
        res.send("ko duoc de trong b truong tren")
    }

}
const checkNumberClass =(req,res,next)=>{
    const {numberClass}=req.body
    if(numberClass>=1 && numberClass<=12){
        next()
    }else{
        res.send("lop phai lon hon 1 va be hon 12")
    }

}
module.exports={
    checkEmpty,
    checkNumberClass
}