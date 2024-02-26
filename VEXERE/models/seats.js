'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  class Seats extends Model {
    /**
     * Helper method for defining associations.
     * This method is not a part of Sequelize lifecycle.
     * The `models/index` file will call this method automatically.
     */
    static associate(models) {
      // define association here
      Seats.belongsTo(models.Vehicles,{foreignKey:"vehicleId"})
    }
  }
  Seats.init({
    name: DataTypes.STRING,
    status: DataTypes.STRING,
    vehicleID: DataTypes.STRING
  }, {
    sequelize,
    modelName: 'Seats',
  });
  return Seats;
};