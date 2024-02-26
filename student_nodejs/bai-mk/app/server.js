const express = require('express')
const app = express()
const router =require("./routers/root.router")
const port = 7000

app.use(express.json())
app.use(router)


// app.get('/', (req, res) => {
//   res.send('Hello World')
// })



app.listen(port, () => {
  console.log(`Example app listening on port ${port}`)
})

// cau hinh sequelize
const sequelize=require("./model/index")
// sua khong xoa bang
// sequelize.sync({ alter:true})
