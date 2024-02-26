// lay cai bang ten la gi
const {Station}=require("../models")

const createStation = async(req,res)=>{
    try {
        const {name,address,province}=req.body;
        const newStation = await Station.create({name,address,province})
        res.status(201).send(newStation)
        
    } catch (error) {
        res.status(500).send(error)
    }

}

const getAllStation= async (req,res)=>{
    try {
        const getAll=await Station.findAll();
        res.status(200).send(getAll)
        
    } catch (error) {
        res.status(500).send(error)
        
    }
}

const getDeatil= async(req,res)=>{
    const {id}= req.params;
    try {
        const detail= await Station.findOne({
            where:{
                id
            }
        })
        res.status(200).send(detail)
    } catch (error) {
        res.status(500).send(error)
        
    }
}
const updateStation= async(req,res)=>{
    const {id}= req.params;
    const {name,address,province}=req.body;
    try {
        const detail= await Station.findOne({
            where:{
                id,
            }
        });
        detail.name=name;
        detail.address=address;
        detail.province=province;
        await detail.save();
        res.status(200).send(detail)
    } catch (error) {
        res.status(500).send(error)
        
    }
}

const deleteStation= async (req,res)=>{
    const {id}=req.params;
    try {
        await Station.destroy({
            where: {
              id,
            }
          });
        res.status(200).send("xoa thanh cong")
    } catch (error) {
        res.status(500).send(error)
    }
}


module.exports={
    createStation,
    getAllStation,
    getDeatil,
    updateStation,
    deleteStation
}