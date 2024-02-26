
const {getlist,getdetailByid,add,update, deleteByid}=require("../services/student.service")

const getStudentList =async (req,res)=>{
    const student= await getlist()
    if(student){
      res.status(200).send(student)

    }else{
      res.status(404).send("not found")
    }
}

const getStudentDeatilById= async (req,res)=>{
    const parma = req.params;
    const id = parma.id;

    const student=await getdetailByid(id)
  
  
    if (student) {
      
      res.status(200).send(student);
    } else {
      res.status(404).send("not found");
    }

}


const addStudent= async (req,res)=>{
    const student = req.body;
 const newStudent=await add(student)

  res.status(200).send(newStudent);
}

const updateByid= async(req, res) => {
    const parmas = req.params;
    const id = parmas.id;
    const student = req.body;
  
    const studentupdate=await update(id,student)
  
    if (studentupdate) {
     res.status(200).send(studentupdate)
    } else {
      res.send("not found");
    }
  }
const delete1= async (req, res) => {
    const parma = req.params;
    const id = parma.id;
    const deleteStudent=await deleteByid(id)
    if (deleteStudent) {
     res.status(200).send(deleteStudent)
    }
    res.send("not found");
  }

module.exports={
    getStudentList,
    getStudentDeatilById,
    addStudent,
    updateByid,
    delete1
}