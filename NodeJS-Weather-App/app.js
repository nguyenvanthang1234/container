// npm init 
// npm i async-request
// npm run dev (nodemon)

const asyncRequest=require("async-request");



const getweather= async(location)=>{
  const url=`http://api.weatherstack.com/current?access_key=13624c20f6c50872ffb836c9ecd0e39c&query=${location}`
try{
  const res=await asyncRequest(url)
  const data=JSON.parse(res.body)
  const weather={

    isSussess:true,
    region:data.location.region,
    country:data.location.country,
    temperature:data.current.temperature,
    wind_apeed:data.current.wind_apeed,
    precip:data.current.precip,
    cloundcover:data.current.cloundcover,
  }
  console.log(weather)
  return weather

}catch(error){
  return{
    isSussess:false,
    error
  }
}



  }


  
  const express=require("express");
const async = require("hbs/lib/async");
  
  const app=express()
  const path=require("path")
  
  app.set("view engine","hbs")
  
  const pathPublic=path.join(__dirname,"./public")
  app.use(express.static(pathPublic))
  
  
  // http://localhost:7000
  app.get("/", async(req,res)=>{
    const params=req.query;
    const location=params.address;
   const weather= await getweather(location)
    console.log(weather)
if(location){

  res.render("weather",
  {
    status:true,
    region:weather.region,
    country:weather.country,
    temperature:weather.temperature,
    wind_apeed:weather.wind_apeed,
    precip:weather.precip,
    cloundcover:weather.cloundcover,
  })
}else{
  res.render("weather",
  {
 status:false
  })
}
})

app.listen(7000,()=>{
  console.log("da chay")
})