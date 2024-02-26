const {Station}=require("../models")
const {checkExis}=require("../middlewares/validations/checkExis.js")
const express=require("express")
const{ createStation,getAllStation,getDeatil,updateStation,deleteStation}=require("../controllers/station.controller");
const { authenticate } = require("../auth/authenticate.js");
const { authorize } = require("../auth/authorize.js");

const StationRouter=express.Router();

StationRouter.post("/", authenticate,authorize(["admin"]), createStation);
StationRouter.get("/",getAllStation);
StationRouter.get("/:id",getDeatil);

StationRouter.put("/:id",checkExis(Station),updateStation);
StationRouter.delete("/:id",checkExis(Station),deleteStation);

module.exports={
    StationRouter
}
