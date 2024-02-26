// yarn init
// yarn add express mysql2 sequelize
// yarn add sequelize -cli --dev
// npm install -g sequelize-cli
// sequelize init

const express=require("express")
const path=require("path")

// lay cac database tu file model index
const {sequelize}=require("./models")
const {rootRouter}=require("./routers/index")
const Fingerprint = require('express-fingerprint')


const app=express()
app.use(express.json())

// su dung fingerprint
app.use(Fingerprint())

// cai dat ket noi file sever den voi public
const pathserverDirectiory=path.join(__dirname,"./public");
app.use("/public",express.static(pathserverDirectiory))



// dung router
app.use("/api/v1",rootRouter)



app.listen(3000, async () => {
    console.log(`Example app listening on http://localhost:3000`)
    try {
        await sequelize.authenticate();
        console.log('ket noi thanh cong.');
      } catch (error) {
        console.error('ket noi that bai:', error);
      }

  })