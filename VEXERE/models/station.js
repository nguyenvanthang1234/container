'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  class Station extends Model {
    /**
     * Helper method for defining associations.
     * This method is not a part of Sequelize lifecycle.
     * The `models/index` file will call this method automatically.
     */
    static associate(models) {
      Station.hasMany(models.Trips,{foreignKey:'stationId'})
    
    }
  }
  Station.init({
    name: {
      type:DataTypes.STRING,
      allowNull:false,
      validate:{
        notEmpty:true,
        len:[3,30]
      }
    
    },
    address: {
      type:DataTypes.STRING,
      validate:{
        checkLen(value){
          if(value.length >=5 && value.length<=100){
            return true
          }else{
            throw new Error("độ dài phỉ từ 5 đến 100 kí tự")
          }
        }
      }
    },
    province: {
      type:DataTypes.STRING,
      allowNull:false,
      // validate:{
      //   isIn:[['Hà Nội ','Cần Thơ', 'Hồ Chí Minh']]
      // }

    }

  }, 
  {
    sequelize,
    modelName: 'Station',
  });
  return Station;
};

