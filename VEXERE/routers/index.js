const express=require("express")
const{StationRouter} =require("./station.router")
const { userRouter } = require("./user.router")
const {   tripRouters } = require("./trip.routers")
const {fingerprintRouter}=require("./test-finger_print")
const rootRouter=express.Router()

rootRouter.use("/station",StationRouter)
rootRouter.use("/users",userRouter)
rootRouter.use("/trips", tripRouters)
rootRouter.use("/test-finger-print", fingerprintRouter)

module.exports={
    rootRouter
}