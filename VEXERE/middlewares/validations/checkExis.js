const checkExis=(Model)=>{
   return async (req,res,next)=>{
        const {id}=req.params
        //kiem tra xem station co ton tai ko
        const station= await Model.findOne({
            where:{
                id,
            }
        })
        if(station){
            next();
        }else{
            res.status(404).send(`khong tim thay station co id la ${id}`)
        }
    
    }
}



module.exports={
    checkExis

}