const fs = require("fs");


//  doc tat ca
const readALLTask = () => {
  const file = fs.readFileSync("task.json");
  // chuyen sang chuoi
  const file2 = file.toString();
  // chuyen sang json
  const result = JSON.parse(file2);
  return result;
};

// tao 1 cai ngau nhien
const createTask = (title,desc) => {
   const newTask={
        id:Math.random().toString(),
        title,
        desc

    };
    // console.log(newTask)
    let tasklist=readALLTask();
    // them vao ne
    tasklist=[...tasklist,newTask]
    fs.writeFileSync("task.json",JSON.stringify(tasklist))
  
};

//  lay theo id
const readDeatil = (id) => {
// doc tat ca cac du lieu tư ham readALLTask
const tasklist=readALLTask()
const task=tasklist.find((task)=>id===task.id)
return task
  
};


//  cap nhat
const updateTask=(id,title,desc)=>{
  let tasklist=readALLTask()
  //  kiem tra id co trung id truyen vao hay ko
  const index=tasklist.findIndex((task)=>task.id===id)
 
  if(index!==-1){
    // lay id cua mang can lam viec
    const oldTask=tasklist[index]
    // ... sao chep tat ca thuoc tinh cua cai cu
    const newTask={...oldTask,title,desc}
    tasklist[index]=newTask
    //  ghi lai vao file cu
    fs.writeFileSync("task.json",JSON.stringify(tasklist))
    return newTask
  }else{
   return false
  }

}


// xoa
const deleteTask=(id)=>{
  // lay tat ca ra kiem tra ne
  let tasklist=readALLTask();
//  kiem tra xem co trung id truyen vao dung ko
  const index=tasklist.findIndex((task)=>task.id===id)
  if(index!==-1){
    const task=tasklist[index]
    //  neu no trung thi loai bo ra dung fillter la no se loai vi the neu no khac no se giu nguyen
    tasklist=tasklist.filter((task)=>task.id !==id)
    // sau khi xoa xong luu lai mang cu 
    fs.writeFileSync("task.json",JSON.stringify(tasklist))
    //  tra ve phan tu da xoa
    return task

  }else{
    return false
  }

}

const increaseAmount = (id) => {
  let taskList = readALLTask();
  const index = taskList.findIndex((task) => task.id === id);
  if (index !== -1) {
    const taskToUpdate = taskList[index];
    if (taskToUpdate.hasOwnProperty("amount")) {
      // Check if "amount" property exists
      taskToUpdate.amount += 50; // Increase the "amount" by 50
      fs.writeFileSync("task.json", JSON.stringify(taskList));
      return taskToUpdate;
    } else {
      console.log("The task does not have an 'amount' property.");
      return null;
    }
  }
  return null;
};

module.exports = {
  readALLTask,
  createTask,
  readDeatil,
  updateTask,
  deleteTask,
  increaseAmount
};
