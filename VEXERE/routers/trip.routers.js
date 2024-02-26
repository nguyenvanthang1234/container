const express= require("express")
const{createTrip,getAll,deleteId,updateTrip}=require("../controllers/trip.controller")
const tripRouters=express.Router()

tripRouters.post("/",createTrip)
tripRouters.get("/",getAll)
tripRouters.delete("/:id",deleteId)
tripRouters.put("/:id",updateTrip)

module.exports={
    tripRouters
}