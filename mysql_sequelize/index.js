const { Sequelize, DataTypes } = require("sequelize");

const sequelize = new Sequelize("thanganh", "root", "thangdai03", {
  host: "localhost",
  dialect: "mysql",
});
// tao model tuong duuong tao bang trong mysql
const Task = sequelize.define("Task", {
    name:{
        type:DataTypes.STRING, // khai bao name varchar(255)
        allowNull:false // not null
    },
   status:{
    type:DataTypes.STRING,
    allowNull:false
   }
});

// them du lieu 
const createTask=(name,status)=>{
  const newTask=Task.create({
    name,
    status
  })

}
// createTask("bo dai","khon ngoan")

// lay du lieu
const getlist= async()=>{
  const task= await Task.findAll()
  console.log(JSON.stringify(task,null,2))
}
// getlist()


//lay du lieu theo id
const getbyid= async (id)=>{
 
  console.log(JSON.stringify(task,null,2))
} 
// getbyid(4)

// updatebyid
const updatebyid= async (data,id)=>{
 await Task.update(data,{
    where:{
       id:id
    }
   
  })

}
// updatebyid({
//   name:"vu anh",
//   status:"qua khon"
// },2);


// delete
const deletebyid= async (id)=>{
  await Task.destroy({
     where:{
        id:id
     }
    
   })
 
 }

deletebyid(1)


// dong bo model voi mysql
const syncModel= async()=>{
     await Task.sync({force:true})// xoa bang cu di tao bang moi
    // Task.sync({alter:true})// sua bang cu di tao bang moi
    console.log("da dong bo model")
}
// syncModel()



const checkConnect = async () => {
  try {
    await sequelize.authenticate();
    console.log("ket noi thanh cong");
  } catch (error) {
    console.log("ket noi that bai");
  }
};
checkConnect();
