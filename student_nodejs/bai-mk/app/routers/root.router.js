const express=require("express")
const router=express.Router();
const studentRouter=require("./student.router")

// bo student di
// router.use("/student",studentRouter)
router.use(studentRouter)

module.exports=router;