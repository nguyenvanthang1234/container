const {users}=require("../models")
const express=require("express")
const{ register, login, uploadAvatar,getAllTrip}=require("../controllers/user.controller.js")
const {uploadImage}=require("../middlewares/upload/upload-image.js")
const {authenticate}=require("../auth/authenticate.js")
const userRouter=express.Router();

userRouter.post("/register",register);
userRouter.post("/login",login);
userRouter.get("/all-trip",getAllTrip);

// upload file


userRouter.post("/upload-avatar",authenticate,uploadImage("avatar"),uploadAvatar)


module.exports={
    userRouter
}
