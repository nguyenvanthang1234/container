const {DataTypes}=require("sequelize")

const createStudentModel=(sequelize)=>{
    return sequelize.define(
        "Student",
        {
            fullname:{
                type:DataTypes.STRING,
                allowNull:false
            },
            age:{
                type:DataTypes.INTEGER,
                allowNull:false
            },
            numberClass:{
                type:DataTypes.INTEGER,
                allowNull:false
            }
        },{
            // day la cai truong ngay tao ne
            timestamps:true,
            tableName:"student"
        }
    )
}

module.exports={
    createStudentModel
}