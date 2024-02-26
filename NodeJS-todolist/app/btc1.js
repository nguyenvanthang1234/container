const yargs=require("yargs")
const fs= require("fs")

const {create,readAll,readDeatil,update,deleteTask}=require("../model/task1")


// lay tat ca
yargs.command({
    command: "readAll",
  
    handler: () => {
      const result = readAll();
      console.log(result);
    },
  });


// create
yargs.command({
    command:"create",
    builder:{
        id:{
            type:"string"
        },
        title:{
            type:"string"
        },
        price:{
            type:"string"
        },
        amount:{
            type:"string"
        },
        desc:{
            type:"string"
        },
    },

    handler:(args)=>{
        const {title,price,desc}=args
        const newTask=create(title,price,desc);
        console.log("da them thanh cong:",newTask)




    }
});


  
yargs.command({
    command: "read-detail",
  
    handler: (args) => {
      const {id}=args
       const task=readDeatil(id)
       if(task){
        console.log("co nhe",task)
    
        }else{
            console.log("ko co")
        }
     
    },
  });
  
yargs.command({
    command: "update",
  
    handler: (args) => {
    const{id,price, title,desc}=args
    const task=update(id,title,desc,price)
    if(task){
        console.log("cap nhat thanh cong",task)
    }else{
        console.log("ko tim thay")
    }
    },
  });

yargs.command({
    command:"delete",
    builder:{
      id:{
        type:"string"
      }
    },
  
    handler:(args)=>{
      const {id}=args
  
      const task=deleteTask(id)
      if(task){
        console.log("da xoa",task)
      }else{
        console.log("ko tim thay id nay")
      }
    }
});
  



yargs.parse()