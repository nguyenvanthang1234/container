const { Sequelize, DataTypes } = require("sequelize");
const {createStudentModel}=require("./student.model")
const { HOST, USER, PASSWORD, DB, DIALECT } = require("../configs/db.configs");


const sequelize=new Sequelize(DB,USER,PASSWORD,{
    host:HOST,
    dialect:DIALECT
})

const Student=createStudentModel(sequelize)

module.exports={
    sequelize,
    Student
}

