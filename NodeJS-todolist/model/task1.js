const fs=require("fs")

const readAll=()=>{
    const file=fs.readFileSync("task1.json")

    const file2=file.toString()

    const result=JSON.parse(file2)
    return result
}

const create=(title,price,desc)=>{
    const newTask={
        id:Math.random().toString(),
        amount:Math.random().toString(),
        title,
        desc,
        price

    }
    let tasklist=readAll()

    tasklist=[...tasklist,newTask]
    fs.writeFileSync("task1.json",JSON.stringify(tasklist))


}

const readDeatil=(id)=>{
    let tasklist=readAll()
    const task=tasklist.find((task=>task.id===id))
    return task
}

const update=(id,title,desc,price)=>{
    let tasklist=readAll()
    index=tasklist.findIndex((task)=>task.id===id)
    if(index!=-1){
        const oldTask=tasklist[index]
        const newTask={...oldTask,title,desc,price}
        tasklist[index]=newTask
        fs.writeFileSync("task1.json",JSON.stringify(newTask))
        return newTask


    }else{
        return false

    }

}
const deleteTask = (id) => {
    let taskList = readAll();
    const index = taskList.findIndex((task) => task.id === id);
    if (index !== -1) {
      const task = taskList[index];
      taskList = taskList.filter((task) => task.id !== id);
      fs.writeFileSync("task1.json", JSON.stringify(taskList));
      return task;
    } else {
      return null;
    }
  };



module.exports={
    readAll,
    create,
    readDeatil,
    update,
    deleteTask
}