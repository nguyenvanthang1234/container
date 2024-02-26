const express = require('express')
const app = express()
const router=require("../routers/root.router")
const port = 4000

app.use(express.json())
// suw dung cai router ben file router goc
app.use(router)
// chuyen req,res ve file json


app.listen(port, () => {
  console.log(`Example app listening on port ${port}`)
})