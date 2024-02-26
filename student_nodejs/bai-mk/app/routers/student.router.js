const express = require("express");
const { getStudentList,getStudentDeatilById,addStudent, updateByid, delete1 } = require("../controller/student.controller");
const { checkEmpty,checkNumberClass } = require("../middleware/student.validation");
const studentRouter = express.Router();


// lay danh sach co cai middleware
studentRouter.get("/student", 
// (req,res,next)=>{
//     console.log("day la tinh nag lay danh sach hoc sinh")
//     // ko co next nos ko chay den ham ben duoi
//     // next()
// },

getStudentList);

// lay theo id
studentRouter.get("/student/:id", getStudentDeatilById);

// them 
studentRouter.post("/add",checkEmpty,checkNumberClass, addStudent);

// update
studentRouter.put("/update/:id", updateByid);

// xoa
studentRouter.delete("/delete/:id",delete1);

module.exports =studentRouter;
